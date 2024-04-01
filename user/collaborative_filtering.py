#!/usr/bin/python
# -*- coding: UTF-8 -*-
'''
基于用户的推荐算法
'''
from math import sqrt,pow
import operator
class UserCf():

    #获得初始化数据
    def __init__(self,data):
        self.data=data

    #通过用户名获得电影列表，仅调试使用
    def getItems(self,username1,username2):
        return self.data[username1],self.data[username2]

    #计算两个用户的皮尔逊相关系数
    def pearson(self,user1,user2):#数据格式为：电影，评分  {'Snakes on a Plane': 4.5, 'You, Me and Dupree': 1.0, 'Superman Returns': 4.0}
        sumXY=0.0
        n=0
        sumX=0.0
        sumY=0.0
        sumX2=0.0
        sumY2=0.0
        try:
            for movie1,score1 in user1.items():
                if movie1 in user2.keys():#计算公共的电影的评分
                    n+=1
                    sumXY+=score1*user2[movie1]
                    sumX+=score1
                    sumY+=user2[movie1]
                    sumX2+=pow(score1,2)
                    sumY2+=pow(user2[movie1],2)

            molecule=sumXY-(sumX*sumY)/n
            denominator=sqrt((sumX2-pow(sumX,2)/n)*(sumY2-pow(sumY,2)/n))
            r=molecule/denominator
        except Exception as e:
            print ("异常信息:",e.message)
            return None
        return r

    #计算与当前用户的距离，获得最临近的用户
    def nearstUser(self,username,n=1):
        distances={};#用户，相似度
        for otherUser,items in self.data.items():#遍历整个数据集
            if otherUser not in username:#非当前的用户
                distance=self.pearson(self.data[username],self.data[otherUser])#计算两个用户的相似度
                distances[otherUser]=distance
        sortedDistance=sorted(distances.items(),key=operator.itemgetter(1),reverse=True);#最相似的N个用户
        print ("排序后的用户为：",sortedDistance)
        return sortedDistance[:n]


    #给用户推荐电影
    def recomand(self,username,n=1):
        recommand={};#待推荐的电影
        for user,score in dict(self.nearstUser(username,n)).items():#最相近的n个用户
            print ("推荐的用户：",(user,score))
            for movies,scores in self.data[user].items():#推荐的用户的电影列表
                if movies not in self.data[username].keys():#当前username没有看过
                    print ("%s为该用户推荐的电影：%s"%(user,movies))
                    if movies not in recommand.keys():#添加到推荐列表中
                        recommand[movies]=scores

        return sorted(recommand.items(),key=operator.itemgetter(1),reverse=True);#对推荐的结果按照电影评分排序

if __name__=='__main__':
    users = {'Lisa Rose': {'Lady in the Water': 2.5, 'Snakes on a Plane': 3.5,
                           'Just My Luck': 3.0, 'Superman Returns': 3.5, 'You, Me and Dupree': 2.5,
                           'The Night Listener': 3.0},

             'Gene Seymour': {'Lady in the Water': 3.0, 'Snakes on a Plane': 3.5,
                              'Just My Luck': 1.5, 'Superman Returns': 5.0, 'The Night Listener': 3.0,
                              'You, Me and Dupree': 3.5},

             'Michael Phillips': {'Lady in the Water': 2.5, 'Snakes on a Plane': 3.0,
                                  'Superman Returns': 3.5, 'The Night Listener': 4.0},

             'Claudia Puig': {'Snakes on a Plane': 3.5, 'Just My Luck': 3.0,
                              'The Night Listener': 4.5, 'Superman Returns': 4.0,
                              'You, Me and Dupree': 2.5},

             'Mick LaSalle': {'Lady in the Water': 3.0, 'Snakes on a Plane': 4.0,
                              'Just My Luck': 2.0, 'Superman Returns': 3.0, 'The Night Listener': 3.0,
                              'You, Me and Dupree': 2.0},

             'Jack Matthews': {'Lady in the Water': 3.0, 'Snakes on a Plane': 4.0,
                               'The Night Listener': 3.0, 'Superman Returns': 5.0, 'You, Me and Dupree': 3.5},

             'Toby': {'Snakes on a Plane': 4.5, 'You, Me and Dupree': 1.0, 'Superman Returns': 4.0}
             }

    userCf=UserCf(data=users)
    recommandList=userCf.recomand('Toby', 2)
    print ("最终推荐：%s"%recommandList)