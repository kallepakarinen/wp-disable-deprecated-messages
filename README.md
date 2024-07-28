# wp-disable-deprecated-messages
remove depecated message from debug.log

Install this inside wordpress mu-plugins folder

## add deprecated messages to your own file
uncomment this function set_error_handler('custom_error_handler'); and notifications are saved in their own file in the wp-content folder. file name is deprecated.log.
