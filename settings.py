ERVER_NAME = '127.0.0.1:5000'


# people = {
#     # 'title' tag used in item links. Defaults to the resource title minus
#     # the final, plural 's' (works fine in most cases but not for 'people')
#     'item_title': 'person',

#     # by default the standard item entry point is defined as
#     # '/people/<ObjectId>/'. We leave it untouched, and we also enable an
#     # additional read-only entry point. This way consumers can also perform
#     # GET requests at '/people/<lastname>/'.
#     'additional_lookup': {
#         'url': '[\w]+',
#         'field': 'lastname'
#     },

#     # We choose to override global cache-control directives for this resource.
#     'cache_control': 'max-age=10,must-revalidate',
#     'cache_expires': 10,

#     # most global settings can be overridden at resource level
#     'resource_methods': ['GET', 'POST'],

#     'schema': schema
# }

DOMAIN = {
    'people': {},
}
