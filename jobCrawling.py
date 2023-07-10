# 이 코드를 시행하기 전에 mysql에 데이터베이스와 유저를 만들어 줘야한다.
import MySQLdb
import json
import urllib.request as req

conn = MySQLdb.connect(
    user="Taegwan",
    password="201920969",
    host="localhost",
    db="TermDB"
    # charset="utf-8"
)

cursor = conn.cursor()

# cusor.excute()를 통해 SQL문 작성
cursor.execute("DROP TABLE IF EXISTS jobs") # 테이블 초기화
cursor.execute("CREATE TABLE jobs (jobname varchar(50) NOT NULL PRIMARY KEY, profession text, summary text, possibility text, salary text, similarJob text, major text)") # 테이블 생성

# 직업의 정보 변수
res1 = req.urlopen("https://www.career.go.kr/cnet/openapi/getOpenApi?apiKey=8ce5dd6e0aa33a2bedc934b4a659f3f6&svcType=api&svcCode=JOB&contentType=json&gubun=job_dic_list&perPage=1000")
json_obj1 = json.load(res1)

# 직업의 개수 저장
job_count = 0
for i in enumerate(json_obj1["dataSearch"]["content"]): # 순회 가능한 객체(예: 리스트, 튜플, 문자열)를 입력으로 받아 인덱스와 해당 요소를 순회하는 데 사용된다.
    job_count += 1

# 각 직업의 상세 정보 저장
for i in range(0, job_count):
    job_info1 = json_obj1["dataSearch"]["content"][i]["jobdicSeq"]
    link = "https://www.career.go.kr/cnet/openapi/getOpenApi?apiKey=8ce5dd6e0aa33a2bedc934b4a659f3f6&svcType=api&svcCode=JOB_VIEW&contentType=json&gubun=job_dic_list&jobdicSeq="+job_info1
    res2 = req.urlopen(link)
    json_obj2 = json.load(res2)
    major_nam = []
    for item in json_obj2["dataSearch"]["content"][0]["capacity_major"][1]["major"]:
        if "MAJOR_NM" in item:
            major_value = item["MAJOR_NM"]
            major_nam.append(major_value)
    major_string = ' '.join(s for s in major_nam)
    cursor.execute("INSERT INTO jobs VALUES (%s, %s, %s, %s, %s, %s, %s)", (json_obj1["dataSearch"]["content"][i]["job"], json_obj1["dataSearch"]["content"][i]["profession"], \
        json_obj1["dataSearch"]["content"][i]["summary"], json_obj2["dataSearch"]["content"][0]["job_possibility"][0]["possibility"], \
            json_obj2["dataSearch"]["content"][0]["stateofemp"][2]["salery"], json_obj2["dataSearch"]["content"][0]["similarJob"], major_string))

# 데이터베이스에 대한 변경 사항을 영구적으로 저장 (insert, update, delete 등을 수행한 후 영구적 저장하기 위해)
conn.commit()