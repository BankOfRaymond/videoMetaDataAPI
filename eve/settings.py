
MONGO_HOST = 'localhost'
MONGO_PORT = 27017
# MONGO_USERNAME = 'user'
# MONGO_PASSWORD = 'user'
MONGO_DBNAME = 'video_metadata_api'


SERVER_NAME = 'ec2-54-214-42-17.us-west-2.compute.amazonaws.com:5000'
#SERVER_NAME = '127.0.0.1'

# Enable reads (GET), inserts (POST) and DELETE for resources/collections
# (if you omit this line, the API will default to ['GET'] and provide
# read-only access to the endpoint).
RESOURCE_METHODS = ['GET', 'POST', 'DELETE']

# Enable reads (GET), edits (PATCH) and deletes of individual items
# (defaults to read-only item access).
ITEM_METHODS = ['GET', 'PATCH', 'DELETE']
# HATEOAS = False

PAGINATION = True
DATE_FORMAT = "%Y-%m-%d-%H%M"
DEBUG = True



schema = { 
        'release_date': {
            'type': 'datetime'
        },
        'ovp':{
            'type': 'string',
        },
        'video_length':{
            'type': 'int'
        },
        'views':{
            'type': 'int'
        },
        'premium':{
            'type': 'boolean'
        },
        'promoted':{
            'type': 'boolean'
        },
        'brand': {
            'type': 'string',
            'minlength': 1,
            'maxlength': 15,
            'required': True,
        },
        'category':{
            'type': 'string',
        }
        ,
        'content':{
            'type':'list',
            'items':{
                'language'  : {'type': 'string'},
                'title'     : {'type': 'string'},
                'tags'      : {
                                'type': 'list',
                                'items':{ 'tag': {'type': 'string'} }
                            },
                'description': {'type': 'string'}            
            }
        }
    }

video = {
    # 'title' tag used in item links. Defaults to the resource title minus
    # the final, plural 's' (works fine in most cases but not for 'people')
    'item_title': 'video',

    # by default the standard item entry point is defined as
    # '/people/<ObjectId>/'. We leave it untouched, and we also enable an
    # additional read-only entry point. This way consumers can also perform
    # GET requests at '/people/<lastname>/'.
    'additional_lookup': {
        'url': '[\w]+',
        #'field': 'video_id',
        'field': 'brand',
    },

    # We choose to override global cache-control directives for this resource.
    'cache_control': 'max-age=10,must-revalidate',
    'cache_expires': 10,

    # most global settings can be overridden at resource level
    'resource_methods': ['GET', 'POST', 'DELETE'],
   
     
    'schema': schema
}



















schema2 = {
    # Schema definition, based on Cerberus grammar. Check the Cerberus project
    # (https://github.com/nicolaiarocci/cerberus) for details.
    'firstname': {
        'type': 'string',
        'minlength': 1,
        'maxlength': 10,
    },
    'lastname': {
        'type': 'string',
        'minlength': 1,
        'maxlength': 15,
        'required': True,
        # talk about hard constraints! For the purpose of the demo
        # 'lastname' is an API entry-point, so we need it to be unique.
        'unique': True,
    },
    # 'role' is a list, and can only contain values from 'allowed'.
    'role': {
        'type': 'list',
        'allowed': ["author", "contributor", "copy"],
    },
    # An embedded 'strongly-typed' dictionary.
    'location': {
        'type': 'dict',
        'schema': {
            'address': {'type': 'string'},
            'city': {'type': 'string'}
        },
    },
    'born': {
        'type': 'datetime',
    },
}


people = {
    # 'title' tag used in item links. Defaults to the resource title minus
    # the final, plural 's' (works fine in most cases but not for 'people')
    'item_title': 'person',

    # by default the standard item entry point is defined as
    # '/people/<ObjectId>/'. We leave it untouched, and we also enable an
    # additional read-only entry point. This way consumers can also perform
    # GET requests at '/people/<lastname>/'.
    'additional_lookup': {
        'url': '[\w]+',
        'field': 'lastname'
    },

    # We choose to override global cache-control directives for this resource.
    'cache_control': 'max-age=10,must-revalidate',
    'cache_expires': 10,

    # most global settings can be overridden at resource level
    #'resource_methods': ['GET', 'POST'],
     
    'schema': schema2
}


DOMAIN = {
    'people': people,
    'video' : video,

}
