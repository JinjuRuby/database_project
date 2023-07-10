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
cursor.execute("DROP TABLE IF EXISTS department") # 테이블 초기화
cursor.execute("CREATE TABLE department (major varchar(50) NOT NULL PRIMARY KEY, summary text, employment_rate text, qualifications text, enter_field text, job text)") # 테이블 생성

# 학과 코드 리스트
dep_list = [253, 10024, 10156, 309, 10031, 508, 23, 70, 27, 10015, 166, 390, 240, 322, 69, 366, 152, 569, 260, 10146, 267, 10, 261, 318, 10010, 413]

# 학과명, 학과 개요, 취업률, 관련자격,    졸업 후 진출분야 테이블에 저장
for i in range(0, len(dep_list)):
    link = "https://www.career.go.kr/cnet/openapi/getOpenApi?apiKey=8ce5dd6e0aa33a2bedc934b4a659f3f6&svcType=api&svcCode=MAJOR_VIEW&contentType=json&gubun=univ_list&perPage=502&majorSeq=" + str(dep_list[i])
    dep_link = req.urlopen(link)
    json_dep = json.load(dep_link)
    descriptions = []
    for item in json_dep["dataSearch"]["content"][0]["enter_field"]:
        if "description" in item:
            description_value = item["description"]
            descriptions.append(description_value)
    descriptions_string = ' '.join(s for s in descriptions)
    cursor.execute("INSERT INTO department VALUES (%s, %s, %s, %s, %s, %s)", (json_dep["dataSearch"]["content"][0]["major"], json_dep["dataSearch"]["content"][0]["summary"],\
        json_dep["dataSearch"]["content"][0]["chartData"][0]["employment_rate"][0]["data"], json_dep["dataSearch"]["content"][0]["qualifications"], descriptions_string\
            , json_dep["dataSearch"]["content"][0]["job"]))

# 데이터베이스에 대한 변경 사항을 영구적으로 저장 (insert, update, delete 등을 수행한 후 영구적 저장하기 위해)
conn.commit()