#!/usr/bin/python
# -*- coding: UTF-8 -*-
'''
基于用户的推荐算法
'''
from math import sqrt,pow
import operator
import json
import os

class UserCf():

    #获得初始化数据
    def __init__(self,data):
        self.data=data

    #通过用户名获得志愿服务名称
    def getItems(self,username1,username2):
        return self.data[username1],self.data[username2]

    #计算两个用户的皮尔逊相关系数
    def pearson(self,user1,user2):#数据格式为：志愿活动，评分  {'activity2': 4.5, 'activity5': 1.0, 'activity4': 4.0}
        sumXY=0.0
        n=0
        sumX=0.0
        sumY=0.0
        sumX2=0.0
        sumY2=0.0
        try:
            for activity1,score1 in user1.items():
                if activity1 in user2.keys():#计算公共的志愿活动的评分
                    n+=1
                    sumXY+=score1*user2[activity1]
                    sumX+=score1
                    sumY+=user2[activity1]
                    sumX2+=pow(score1,2)
                    sumY2+=pow(user2[activity1],2)

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


    #给用户推荐志愿服务
    def recomand(self,username,n=1):
        recommand={};#待推荐的志愿服务
        for user,score in dict(self.nearstUser(username,n)).items():#最相近的n个用户
            print ("推荐的用户：",(user,score))
            for activities,scores in self.data[user].items():#推荐的用户的志愿服务列表
                if activities not in self.data[username].keys():#当前username没有参加过
                    print ("%s为该用户推荐的志愿服务：%s"%(user,activities))
                    if activities not in recommand.keys():#添加到推荐列表中
                        recommand[activities]=scores

        return sorted(recommand.items(),key=operator.itemgetter(1),reverse=True);#对推荐的结果按照志愿服务评分排序

if __name__=='__main__':
    # 数据库存放 这里使用外部数据导入形式代替

    # 绝对路径编码
    with open('user/users.json', 'r', encoding='utf-8') as file:
        users = json.load(file)

    userCf=UserCf(data=users)
    recommandList=userCf.recomand('小樊', 2)
    print ("最终推荐：%s"%recommandList)

