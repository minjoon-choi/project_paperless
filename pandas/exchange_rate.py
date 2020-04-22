from bs4 import BeautifulSoup
from urllib.request import urlopen
import requests
from urllib import parse, driver

#res = urlopen('https://finance.naver.com/marketindex/exchangeDetail.nhn?marketindexCd=FX_usdKRW').read().decode()
#soup = BeautifulSoup(res, 'html.parser')

src = driver.find_element_by_name("일별시세").get_attribute("/marketindex/exchangeDailyQuote.nhn?marketindexCd=FX_USDKRW")
url = urljoin(base_url, src)

driver.get(url)
print(driver.page_source)  


#url = 'https://finance.naver.com/marketindex/exchangeDetail.nhn?marketindexCd=FX_usdKRW'
#res = requests.post(url)

#print(res.text)