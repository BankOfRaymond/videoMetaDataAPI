from cerberus import Validator

v = Validator()

# schema ={
#         'type': 'list',
#         'allowed':[
#             {
#                 'type':'dict',
#                 'schema':{
#                     'video_list_id': {'type': 'int', 'unique':True, 'required':True},
#                     'video_source': {'type':'string'},
#                     'video_id': {'type':'string'}
#                 },
#             },
#         ],
#     }

# doc = {"id":"42", "video":[{"video_list_id":"1", "video_source":"vzaar","video_id":"vzvd-1312694"}],"brand": "ian", "release_date": "2013-11-22-0039"}

# schemaTest = { "arbitraryNum": {"type": "string", 
# 									'maxlength':15}}
# docTest = {"arbitraryNum":12321}

schema = { 

		"video":{
			"type": "list",
			"items": {
				"video_source": {"type":"string"},
				"video_id": {"type": "string"}
			}
		},
		"brand": {
	        "type": "string",
	        "minlength": 1,
	        "maxlength": 15,
	        "required": True,
	        #'unique': True,
	    },
	    "category":{
	        "type": "string",
	    },
		"content":{
	        "type":"list",
	        "items":{
	            "language"  : {"type": "string"},
	            "title"     : {"type": "string"},
	            "tags"      : {
	                            "type": "list",
	                            "items":{ "tag": {"type": "string"} }
	                        },
	            "description": {"type": "string"}            
	        }
	    }
	}

doc = {
		"brand": "Ian",
		"video": [ 
			{
				"video_source": "vzaar", 
				"video_id": "124123121"
			}
		],
		"category": "Basketball",
		"content": [
			{	
				"language": "English",
				"title":"Ian shoots",
				"tags":	[
					{"tag": "Bask"},
					{"tag": "Awesomeshots"},
					{"tag": "3 pts!"}
				],
				"description": "In the example above, item2 did not validate and was rejected, while item1 was successfully created. The API maintainer has complete control of data validation. "
			},
			{	
				"language": "French",
				"title":"Ian jette le ball",
				"tags":	[
					{"tag": "Excellent"},
					{"tag": "Mangnifique"},
					{"tag": "3 points!"}
				],
				"description": "This is a text file in French "
			}
		]

	}

print v.validate(doc, schema)



schema = {
    'release_date': {
        'type': 'datetime'
    },
    'brand': {
        'type': 'string',
        'minlength': 1,
        'maxlength': 15,
        'required': True,
        #'unique': True,
    },
    # "video":{
    #     'type': 'list',
    #     'items': {
    #         'video_source': {'type':'string'},
    #         'video_id': {'type': 'string'}
    #     }
    # },
    'id':{
        'type': "string",
        'required': True,
        #'unique': True
    },
    'category':{
        'type': 'string',
    },
    # 'content':{
    #     'type':'list',
    #     # 'items':{
    #     #     'language'  : {'type': 'string'},
    #     #     'title'     : {'type': 'string'},
    #     #     # 'tags'      : {
    #     #     #                 'type': 'list',
    #     #     #                 'items':{ 'tag': 'string'}
    #     #     #             },
    #     #     'description': {'type': 'string'}            
    #     # }
    # }


}

doc = {
	"id": "11145",
	"brand": "Ian",
	"release_date":"2013-01-01-1000",
	# "video": [
	# 			{
	# 				"video_source": "vzaar",
	# 				"video_id": "124124213541"
	# 			}
	# 		],
	"category": "Basketball Practice",
	# "content":[
	# 			{	
	# 				"language"	: "English",
	# 				"title"	  	: "Ian Shoots Hoops"
	# 			}
	# 		]

}
#print v.validate(doc, schema)

