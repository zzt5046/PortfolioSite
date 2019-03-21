from flask import Flask, jsonify, request
import random

app = Flask(__name__);

@app.route("/info/", methods=['GET'])
def basicData():
	return jsonify({
		"name": "Zachary J. Thomas",
		"age": 22,
		"major": "Information Sciences and Technology",
		"school": "Penn State",
		"hobbies": "stuff like this, PC building, fixing cars, cooking",
		"api_creation_date": "3/20/2019 11:29PM",
		"finished": "no"
		})

@app.route("/rand/<int:num>", methods=['GET'])
def rand(num):
	return jsonify({"number:" : random.randint(1,num)})
	

if __name__ == '__main__':
	app.run(host='0.0.0.0', port=5000, debug=True)