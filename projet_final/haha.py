import pandas as pd
import numpy as np
from surprise import NormalPredictor
from surprise import Dataset
from surprise import Reader
from surprise.model_selection import cross_validate
from surprise import SVD
from surprise import Dataset
from surprise.model_selection import GridSearchCV
from collections import defaultdict
import json
import pandas as pd
from sqlalchemy import create_engine
import sys

a = int(sys.argv[1])
b = int(sys.argv[2])
c = int(sys.argv[3])
d = int(sys.argv[4])
e = int(sys.argv[5])





def cosine_similarity(x,y):
    x = np.array(x)
    y = np.array(y)
    where1 = np.isnan(x)
    x[where1] = 0.00001
    where2 = np.isnan(y)
    y[where2] = 0.00001
    num = x.dot(y.T)
    denom = np.linalg.norm(x) * np.linalg.norm(y)
    return num / denom
def cal_similarity_context(x,tg):
    x['sim_context'] = None
    for j in x.index:
        x['sim_context'][j] = cosine_similarity(x['context_vector'][tg],x['context_vector'][j])
    return x
def select_local(train_data,i):
    df = train_data.copy()
    context_test_rec = cal_similarity_context(df,i)
    local = context_test_rec[context_test_rec['sim_context'] > 0.5]
    media = local.copy()
    localt = media.drop(index=[i])
    return localt,local
def model_train_for_rec(train_data,i):
    localt,local = select_local(train_data,i)
    reader = Reader(rating_scale=(1, 5))
    data = Dataset.load_from_df(localt[['ref_user', 'ref_movie', 'rating']], reader)
    param_grid = {'n_factors': [25, 30, 35, 40],'n_epochs': [5, 10], 'lr_all': [0.002, 0.005],
              'reg_all': [0.4, 0.6]}
    gs = GridSearchCV(SVD, param_grid, measures=['rmse', 'mae'], cv=3)
    gs.fit(data)
    algo = gs.best_estimator['rmse']
    algo.fit(data.build_full_trainset())
    return algo,localt,local
def bian(x):
    x = json.loads(x)
    return x
engine = create_engine('mysql+pymysql://root:110119zjf@localhost:3306/Recsys')
sql_query1 = "select * from History"
df_participants = pd.read_sql_query(sql_query1,engine)
userDATA = [a,1,1,1,1,b,c,d,e]

context = df_participants[['ref_user', 'ref_movie','rating','ref_cluster','ref_movie_cluster','ref_context1',
       'ref_context2', 'ref_context3', 'ref_context4']]
context.loc[-1] = userDATA
context.iloc[:,5:] = context.iloc[:,5:].astype('object')
context = pd.get_dummies(context)

target = context[context['ref_user'] == a]
context_rec = pd.read_csv('/var/www/html/jinfeng/projet_final/history.csv')
context_rec['context_vector'] = context_rec['context_vector'].apply(bian)
f = open('cluster_context_correlation.txt','r')
text = f.read()
cluster_context_correlation = eval(text)
f.close()

target['context_vector'] = None
for i in target.index:
    cluster = target['ref_movie_cluster'][i]
    target['context_vector'][i] = []
    for context in target.columns[5:]:
        if target[context][i] == 1:
            target['context_vector'][i].append(cluster_context_correlation[cluster][context])
userDATA = target.iloc[-1].values
result= target.drop(labels=-1)

result = pd.concat([result,context_rec],ignore_index=True)






res = []

for cluster in [0,1,2,3]:
    df = result.copy()
    df = df[df['ref_movie_cluster'] == cluster]
    df.loc[-1] = userDATA
    df.index = df.index + 1 
    df = df.sort_index()
    df['ref_movie_cluster'][0] = cluster
    df['context_vector'][0] = None
    df['context_vector'][0] = []
    for context in df.columns[5:]:
        if df[context][0] == 1:
            df['context_vector'][0].append(cluster_context_correlation[cluster][context])
    algo,localt,local = model_train_for_rec(df,0)
    df_recommender = df[~df['ref_movie'].isin(df[df['ref_user'] == userDATA[0]]['ref_movie'].values)]
    df_recommender = df_recommender[df_recommender['ref_movie_cluster'] == cluster]
    for item in list(set(df_recommender['ref_movie'])):
        res.append(algo.predict(userDATA[0], item, r_ui = 4, verbose=False))

def get_all_predictions(predictions):
    top_n = defaultdict(list)    
    for uid, iid, true_r, est, _ in predictions:
        top_n[uid].append((iid, est))

    # Then sort the predictions for each user
    for uid, user_ratings in top_n.items():
        user_ratings.sort(key=lambda x: x[1], reverse=True)

    return top_n
all_pred = get_all_predictions(res)

def recommender(userID, n, all_pre):
    for uid, user_ratings in all_pre.items():
        user_ratings.sort(key=lambda x: x[1], reverse=True)
        all_pred[uid] = user_ratings[:n]
    tmp = pd.DataFrame.from_dict(all_pred)
    tmp_transpose = tmp.transpose()
    results = tmp_transpose.loc[userID]
    recommended_movie_ids=[]
    for x in range(0, n):
        recommended_movie_ids.append(results[x][0])
    return recommended_movie_ids
recommend_list = recommender(a,12,all_pred)
print(recommend_list[0])
print(recommend_list[1])
print(recommend_list[2])
print(recommend_list[3])
print(recommend_list[4])
print(recommend_list[5])
print(recommend_list[6])
print(recommend_list[7])
print(recommend_list[8])
print(recommend_list[9])
print(recommend_list[10])
print(recommend_list[11])
