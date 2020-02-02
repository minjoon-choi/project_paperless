import requests
from bs4 import BeautifulSoup
from urllib.request import Request, urlopen
from urllib.parse import urlencode, quote_plus, unquote
import pymysql
from sqlalchemy import create_engine
import pandas as pd
from multiprocessing import Pool
import time

#from pandas import DataFrame, Series

# db = pymysql.connect(
#     host = 'localhost',
#     port = 3306,
#     user='root',
#     passwd='',
#     db='test')
list_receipt_no = []
list_notice_goods_name = []
list_bsn_ofc_name = []
list_goods_kor_name = []
list_goods_eng_name = []
list_item_name = []
list_notice_date = []
list_flow_to_date = []
list_manufac_name = []
list_manufac_country_name = []


def give_page():
    

    url ='http://apis.data.go.kr/1470000/ImportFoodPrmisnInfoService/getImrtsCnfirmList'
    decode_key = unquote('D%2FfY8v%2BQO5BE3JlaIa8JkxCIFWV5ozmKjeafkQdLm5Ihu4w4rGyw4gkS45j0MZnRHJCuYT8JRW076yVNAWgxDQ%3D%3D')
    queryParams = '?' + urlencode({quote_plus('ServiceKey') : decode_key})
    response = requests.get(url+queryParams)
    soup = BeautifulSoup(response.text,"html.parser")
    total_count = soup.find("totalcount")
    pages = int(int(total_count.text)/100+1)
    pages = 100
    return list(range(1,pages+1))

def find_page(page):
    print(page)
    list_receipt_no = []
    list_notice_goods_name = []
    list_bsn_ofc_name = []
    list_goods_kor_name = []
    list_goods_eng_name = []
    list_item_name = []
    list_notice_date = []
    list_flow_to_date = []
    list_manufac_name = []
    list_manufac_country_name = []

    url ='http://apis.data.go.kr/1470000/ImportFoodPrmisnInfoService/getImrtsCnfirmList'
    decode_key = unquote('D%2FfY8v%2BQO5BE3JlaIa8JkxCIFWV5ozmKjeafkQdLm5Ihu4w4rGyw4gkS45j0MZnRHJCuYT8JRW076yVNAWgxDQ%3D%3D')
    queryParams = '?' + urlencode({quote_plus('ServiceKey') : decode_key})
    response = requests.get(url+queryParams)
    soup = BeautifulSoup(response.text,"html.parser")
    queryParams = '?' + urlencode({quote_plus('ServiceKey') : decode_key, 'pageNo' : page, 'numOfRows' : '100'})
    response = requests.get(url+queryParams)
    soup = BeautifulSoup(response.text,"html.parser")
    
    
    all_receipt_no = soup.find_all("receipt_no")
    all_notice_goods_name = soup.find_all("notice_goods_name")
    all_bsn_ofc_name = soup.find_all("bsn_ofc_name")
    all_goods_kor_name = soup.find_all("goods_kor_name")
    all_goods_eng_name = soup.find_all("goods_eng_name")
    all_item_name = soup.find_all("item_name")
    all_notice_date = soup.find_all("notice_date")
    all_flow_to_date = soup.find_all("flow_to_date")
    all_manufac_name = soup.find_all("manufac_name")
    all_manufac_country_name = soup.find_all("manufac_country_name")
    
    for data in all_receipt_no:
        list_receipt_no.append(data.text)
    for data in all_notice_goods_name:
        list_notice_goods_name.append(data.text)
    for data in all_bsn_ofc_name:
        list_bsn_ofc_name.append(data.text)
    for data in all_goods_kor_name:
        list_goods_kor_name.append(data.text)
    for data in all_goods_eng_name:
        list_goods_eng_name.append(data.text)
    for data in all_item_name:
        list_item_name.append(data.text)
    for data in all_notice_date:
        list_notice_date.append(data.text)
    for data in all_flow_to_date:
        list_flow_to_date.append(data.text)    
    for data in all_manufac_name:
        list_manufac_name.append(data.text)   
    for data in all_manufac_country_name:
        list_manufac_country_name.append(data.text)
    dictionary = {'receipt_no': list_receipt_no, 'notice_goods_name': list_notice_goods_name, 'bsn_ofc_name': list_bsn_ofc_name, 'goods_kor_name': list_goods_kor_name, 'goods_eng_name': list_goods_eng_name, 'item_name': list_item_name, 'notice_date': list_notice_date, 'flow_to_date': list_flow_to_date, 'manufac_name': list_manufac_name, 'manufac_country_name': list_manufac_country_name}
    df = pd.DataFrame(dictionary)
    return df


if __name__=='__main__':
    print("11")
    start_time = time.time()
    pool = Pool(processes=16)
    res = pool.map(find_page, give_page())
    pd.set_option('display.max_rows', None)
    print(res)
    #res.to_csv('test.csv', sep='\t', encoding='utf-8')
    print("time : " + time.time()-start_time)