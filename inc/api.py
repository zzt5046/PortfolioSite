from flask import Flask, jsonify, request
import random
import pymysql

app = Flask(__name__);

@app.route("/info/", methods=['GET'])
def basicData():
	return jsonify({
		"name": "Zachary J. Thomas",
		"age": 22,
		"major": "Information Sciences and Technology",
		"school": "Penn State",
		"hobbies": {"stuff like this", "PC building", "fixing cars", "cooking"},
		"api_creation_date": "3/20/2019 11:29PM",
		"finished": "no"
		})

@app.route("/rand/<int:num>", methods=['GET'])
def rand(num):
	return jsonify({"number:" : random.randint(1,num)})
	
@app.route("/dbview/<string:col>", methods=['GET'])
def viewQuery(col):
	conn = pymysql.connect(host='localhost', user='root', password='ziggymysql23', db=str('users'))
	a = conn.cursor()

	if not col:
		sql = 'SELECT * FROM api_users;'
	else:
		sql = 'SELECT ' + str(col) + ' FROM api_users;'

	countrow = a.execute(sql)
	data = a.fetchall()

	return data
		
@app.route("/dbinsert/<string:fname>/<string:lname>/<string:uname>", methods=['POST'])
def insertQuery(fname, lname, uname):
	conn = pymysql.connect(host='localhost', user='root', password='ziggymysql23', db=str('users'))
	a = conn.cursor()

	sql = 'INSERT INTO api_users VALUES(NULL, fname, lname, uname);'
	a.execute(sql)

	return 'OK'

if __name__ == '__main__':
	app.run(host='0.0.0.0', port=5000, debug=True)