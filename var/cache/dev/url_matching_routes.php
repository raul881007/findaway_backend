<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/frontend/members/get_member_by_email' => [[['_route' => 'email_existent', '_controller' => 'App\\Controller\\Member\\MemberSignupMovPostCollectionController::findMemberByEmail'], null, ['POST' => 0], null, false, false, null]],
        '/frontend/partner/list' => [[['_route' => 'partners_list', '_controller' => 'App\\Controller\\Partner\\PartnerSignupMovPostCollectionController::getPartners'], null, ['POST' => 0], null, false, false, null]],
        '/frontend/npreferred_time' => [[['_route' => 'api_n_preferred_times_frontend_collection', '_controller' => 'App\\Controller\\NPreferredTime\\NPreferredTimeFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTime', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/nspecic_outcome' => [[['_route' => 'api_n_specic_outcomes_frontend_collection', '_controller' => 'App\\Controller\\NSpecicOutcome\\NSpecicOutcomeFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcome', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/member/signup' => [[['_route' => 'api_members_signup_collection', '_controller' => 'App\\Controller\\Member\\MemberSignupPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_collection_operation_name' => 'signup', '_api_receive' => true], null, ['POST' => 0], null, false, false, null]],
        '/frontend/member/signup-mov' => [[['_route' => 'api_members_signupMov_collection', '_controller' => 'App\\Controller\\Member\\MemberSignupMovPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_collection_operation_name' => 'signupMov', '_api_receive' => true], null, ['POST' => 0], null, false, false, null]],
        '/search' => [[['_route' => 'api_members_searchGet_collection', '_controller' => 'App\\Controller\\SearchAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_collection_operation_name' => 'searchGet'], null, ['GET' => 0], null, false, false, null]],
        '/frontend/member/profile/me' => [
            [['_route' => 'api_members_memberGet_item', '_controller' => 'App\\Controller\\Member\\MemberGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_item_operation_name' => 'memberGet', '_api_receive' => false], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_members_memberPut_item', '_controller' => 'App\\Controller\\Member\\MemberPutItemController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_item_operation_name' => 'memberPut', '_api_receive' => false], null, ['PUT' => 0], null, false, false, null],
        ],
        '/frontend/member/remind/password' => [[['_route' => 'api_members_remindPassword_item', '_controller' => 'App\\Controller\\Member\\MemberRemindPasswordCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_item_operation_name' => 'remindPassword', '_api_receive' => false], null, ['POST' => 0], null, false, false, null]],
        '/frontend/ndays' => [[['_route' => 'api_n_days_frontend_collection', '_controller' => 'App\\Controller\\NDays\\NDaysFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDays', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/npersonality_style' => [[['_route' => 'api_n_personality_styles_frontend_collection', '_controller' => 'App\\Controller\\NPersonalityStyle\\NPersonalityStyleFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyle', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/partner/signup' => [[['_route' => 'api_partners_signup_collection', '_controller' => 'App\\Controller\\Partner\\PartnerSignupPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_collection_operation_name' => 'signup', '_api_receive' => true], null, ['POST' => 0], null, false, false, null]],
        '/frontend/partner/signup-mov' => [[['_route' => 'api_partners_signupMov_collection', '_controller' => 'App\\Controller\\Partner\\PartnerSignupMovPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_collection_operation_name' => 'signupMov', '_api_receive' => true], null, ['POST' => 0], null, false, false, null]],
        '/frontend/partner/profile/me' => [
            [['_route' => 'api_partners_partnerGet_item', '_controller' => 'App\\Controller\\Partner\\PartnerGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_item_operation_name' => 'partnerGet', '_api_receive' => false], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_partners_partnerPut_item', '_controller' => 'App\\Controller\\Partner\\PartnerPutItemController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_item_operation_name' => 'partnerPut', '_api_receive' => false], null, ['PUT' => 0], null, false, false, null],
        ],
        '/frontend/partner/remind/password' => [[['_route' => 'api_partners_remindPassword_item', '_controller' => 'App\\Controller\\Partner\\PartnerRemindPasswordCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_item_operation_name' => 'remindPassword', '_api_receive' => false], null, ['POST' => 0], null, false, false, null]],
        '/users/dashboard' => [[['_route' => 'api_users_dashboard_collection', '_controller' => 'App\\Controller\\DashboardAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'dashboard', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/ntasks' => [[['_route' => 'api_n_tasks_frontend_collection', '_controller' => 'App\\Controller\\NTask\\NTaskFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/nlevel_urgency' => [[['_route' => 'api_n_level_urgencies_frontend_collection', '_controller' => 'App\\Controller\\NLevelUrgency\\NLevelUrgencyFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgency', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/ncompliment' => [[['_route' => 'api_n_compliments_frontend_collection', '_controller' => 'App\\Controller\\NCompliment\\NComplimentFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NCompliment', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/ngoals' => [[['_route' => 'api_n_goals_frontend_collection', '_controller' => 'App\\Controller\\NGoals\\NGoalsFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/signup' => [[['_route' => 'api_clients_signup_collection', '_controller' => 'App\\Controller\\Client\\ClientSignupPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'signup', '_api_receive' => true], null, ['POST' => 0], null, false, false, null]],
        '/frontend/profile/me' => [
            [['_route' => 'api_clients_clientGet_item', '_controller' => 'App\\Controller\\Client\\ClientGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'clientGet', '_api_receive' => false], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_clients_clientPut_item', '_controller' => 'App\\Controller\\Client\\ClientPutItemController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'clientPut', '_api_receive' => false], null, ['PUT' => 0], null, false, false, null],
        ],
        '/frontend/remind/password' => [[['_route' => 'api_clients_remindPassword_item', '_controller' => 'App\\Controller\\Client\\ClientRemindPasswordCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'remindPassword', '_api_receive' => false], null, ['POST' => 0], null, false, false, null]],
        '/frontend/navailable' => [[['_route' => 'api_n_availables_frontend_collection', '_controller' => 'App\\Controller\\NAvailable\\NAvailableFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailable', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/nfeedback' => [[['_route' => 'api_n_feedbacks_frontend_collection', '_controller' => 'App\\Controller\\NFeedback\\NFeedbackFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedback', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/frontend/supervisor/signup' => [[['_route' => 'api_supervisors_signup_collection', '_controller' => 'App\\Controller\\Supervisor\\SupervisorSignupPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_collection_operation_name' => 'signup', '_api_receive' => true], null, ['POST' => 0], null, false, false, null]],
        '/frontend/supervisor/signup-mov' => [[['_route' => 'api_supervisors_signupMov_collection', '_controller' => 'App\\Controller\\Supervisor\\SupervisorSignupMovPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_collection_operation_name' => 'signupMov', '_api_receive' => true], null, ['POST' => 0], null, false, false, null]],
        '/frontend/supervisor/profile/me' => [
            [['_route' => 'api_supervisors_supervisorGet_item', '_controller' => 'App\\Controller\\Supervisor\\SupervisorGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_item_operation_name' => 'supervisorGet', '_api_receive' => false], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_supervisors_supervisorPut_item', '_controller' => 'App\\Controller\\Supervisor\\SupervisorPutItemController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_item_operation_name' => 'supervisorPut', '_api_receive' => false], null, ['PUT' => 0], null, false, false, null],
        ],
        '/frontend/supervisor/remind/password' => [[['_route' => 'api_supervisors_remindPassword_item', '_controller' => 'App\\Controller\\Supervisor\\SupervisorRemindPasswordCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_item_operation_name' => 'remindPassword', '_api_receive' => false], null, ['POST' => 0], null, false, false, null]],
        '/frontend/languages' => [[['_route' => 'api_languages_frontend_collection', '_controller' => 'App\\Controller\\Languages\\LanguagesFrontendGetCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Language', '_api_collection_operation_name' => 'frontend', '_api_receive' => false], null, ['GET' => 0], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'login'], null, ['POST' => 0], null, false, false, null]],
        '/frontend/login' => [[['_route' => 'client_login'], null, ['POST' => 0], null, false, false, null]],
        '/frontend/token/refresh' => [[['_route' => 'gesdinet_jwt_refresh_token', '_controller' => 'gesdinet.jwtrefreshtoken:refresh'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/files/download/([^/]++)(*:31)'
                .'|/(index)?(?:\\.([^/]++))?(*:62)'
                .'|/doc(?'
                    .'|s(?:\\.([^/]++))?(*:92)'
                    .'|uments(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:126)'
                        .')'
                        .'|/(?'
                            .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:167)'
                            .')'
                            .'|([^/]++)/files(?:\\.([^/]++))?(*:205)'
                        .')'
                    .')'
                .')'
                .'|/c(?'
                    .'|ontexts/(.+)(?:\\.([^/]++))?(*:248)'
                    .'|lients(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:283)'
                        .')'
                        .'|/(?'
                            .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:324)'
                            .')'
                            .'|([^/]++)/documents(?'
                                .'|(?:\\.([^/]++))?(*:369)'
                                .'|/([^/]++)/files(?:\\.([^/]++))?(*:407)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/r(?'
                    .'|atings(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:451)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:489)'
                        .')'
                    .')'
                    .'|oles(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:524)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:562)'
                        .')'
                    .')'
                .')'
                .'|/n_(?'
                    .'|p(?'
                        .'|referred_time(?'
                            .'|_translations(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:633)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:671)'
                                .')'
                            .')'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:703)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:741)'
                                .')'
                            .')'
                        .')'
                        .'|ersonality_style(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:793)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:831)'
                                .')'
                            .')'
                            .'|_translations(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:875)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:913)'
                                .')'
                            .')'
                        .')'
                    .')'
                    .'|feedback(?'
                        .'|_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:970)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1008)'
                            .')'
                        .')'
                        .'|s(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1041)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1080)'
                            .')'
                        .')'
                    .')'
                    .'|specic_outcome(?'
                        .'|_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1143)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1182)'
                            .')'
                        .')'
                        .'|s(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1215)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1254)'
                            .')'
                        .')'
                    .')'
                    .'|level_urgenc(?'
                        .'|y_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1316)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1355)'
                            .')'
                        .')'
                        .'|ies(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1390)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1429)'
                            .')'
                        .')'
                    .')'
                    .'|days(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:1466)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:1505)'
                        .')'
                        .'|_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1549)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1588)'
                            .')'
                        .')'
                    .')'
                    .'|goals(?'
                        .'|_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1642)'
                            .')'
                            .'|/(?'
                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1684)'
                                .')'
                                .'|([^/]++)/language(?:\\.([^/]++))?(*:1726)'
                            .')'
                        .')'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:1755)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:1794)'
                        .')'
                    .')'
                    .'|task(?'
                        .'|s(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1834)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1873)'
                            .')'
                        .')'
                        .'|_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1918)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1957)'
                            .')'
                        .')'
                    .')'
                    .'|compliment(?'
                        .'|s(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2004)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2043)'
                            .')'
                        .')'
                        .'|_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2088)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2127)'
                            .')'
                        .')'
                    .')'
                    .'|available(?'
                        .'|_translations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2185)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2224)'
                            .')'
                        .')'
                        .'|s(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2257)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2296)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/f(?'
                    .'|rontend/(?'
                        .'|n(?'
                            .'|p(?'
                                .'|referred_time/([^/]++)(*:2355)'
                                .'|ersonality_style/([^/]++)(*:2389)'
                            .')'
                            .'|specic_outcome/([^/]++)(*:2422)'
                            .'|days/([^/]++)(*:2444)'
                            .'|tasks/([^/]++)(*:2467)'
                            .'|level_urgency/([^/]++)(*:2498)'
                            .'|compliment/([^/]++)(*:2526)'
                            .'|goals/([^/]++)(*:2549)'
                            .'|available/([^/]++)(*:2576)'
                            .'|feedback/([^/]++)(*:2602)'
                        .')'
                        .'|member/login/([^/]++)(*:2633)'
                        .'|partner/login/([^/]++)(*:2664)'
                        .'|login/([^/]++)(*:2687)'
                        .'|supervisor/login/([^/]++)(*:2721)'
                    .')'
                    .'|iles(?'
                        .'|(?:\\.([^/]++))?(*:2753)'
                        .'|(*:2762)'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:2800)'
                        .')'
                    .')'
                .')'
                .'|/m(?'
                    .'|odules(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:2844)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:2883)'
                        .')'
                    .')'
                    .'|e(?'
                        .'|mber(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2927)'
                                .')'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:2969)'
                                    .')'
                                    .'|([^/]++)/n_(?'
                                        .'|goals(?:\\.([^/]++))?(*:3013)'
                                        .'|tasks(?:\\.([^/]++))?(*:3042)'
                                    .')'
                                .')'
                            .')'
                            .'|_(?'
                                .'|goals(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:3084)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:3123)'
                                    .')'
                                .')'
                                .'|tasks(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:3160)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:3199)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|dia/cache/resolve/(?'
                            .'|([A-z0-9_-]*)/rc/([^/]++)/(.+)(*:3263)'
                            .'|([A-z0-9_-]*)/(.+)(*:3290)'
                        .')'
                    .')'
                .')'
                .'|/partners(?'
                    .'|(?:\\.([^/]++))?(?'
                        .'|(*:3332)'
                    .')'
                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                        .'|(*:3371)'
                    .')'
                .')'
                .'|/groups(?'
                    .'|(?:\\.([^/]++))?(?'
                        .'|(*:3410)'
                    .')'
                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                        .'|(*:3449)'
                    .')'
                .')'
                .'|/users(?'
                    .'|(?:\\.([^/]++))?(?'
                        .'|(*:3487)'
                    .')'
                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                        .'|(*:3526)'
                    .')'
                .')'
                .'|/histories(?'
                    .'|(?:\\.([^/]++))?(*:3565)'
                    .'|/(?'
                        .'|([^/]++)/([^/]++)(*:3595)'
                        .'|([^/\\.]++)(?:\\.([^/]++))?(*:3629)'
                    .')'
                .')'
                .'|/supervisors(?'
                    .'|(?:\\.([^/]++))?(?'
                        .'|(*:3673)'
                    .')'
                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                        .'|(*:3712)'
                    .')'
                .')'
                .'|/languages(?'
                    .'|(?:\\.([^/]++))?(?'
                        .'|(*:3754)'
                    .')'
                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                        .'|(*:3793)'
                    .')'
                .')'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:3821)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:3868)'
                            .'|router(*:3883)'
                            .'|exception(?'
                                .'|(*:3904)'
                                .'|\\.css(*:3918)'
                            .')'
                        .')'
                        .'|(*:3929)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        31 => [[['_route' => 'app_downloadfileaction_index', '_controller' => 'App\\Controller\\DownloadFileAction::indexAction'], ['id'], null, null, false, true, null]],
        62 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        92 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        126 => [
            [['_route' => 'api_documents_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_documents_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        167 => [
            [['_route' => 'api_documents_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_documents_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_documents_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        205 => [[['_route' => 'api_documents_files_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\File', '_api_subresource_operation_name' => 'api_documents_files_get_subresource', '_api_subresource_context' => ['property' => 'files', 'identifiers' => [['id', 'App\\Entity\\Document', true]], 'collection' => true, 'operationId' => 'api_documents_files_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        248 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        283 => [
            [['_route' => 'api_clients_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_clients_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        324 => [
            [['_route' => 'api_clients_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_clients_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_clients_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        369 => [[['_route' => 'api_clients_documents_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_subresource_operation_name' => 'api_clients_documents_get_subresource', '_api_subresource_context' => ['property' => 'documents', 'identifiers' => [['id', 'App\\Entity\\Client', true]], 'collection' => true, 'operationId' => 'api_clients_documents_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        407 => [[['_route' => 'api_clients_documents_files_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\File', '_api_subresource_operation_name' => 'api_clients_documents_files_get_subresource', '_api_subresource_context' => ['property' => 'files', 'identifiers' => [['id', 'App\\Entity\\Client', true], ['documents', 'App\\Entity\\Document', true]], 'collection' => true, 'operationId' => 'api_clients_documents_files_get_subresource']], ['id', 'documents', '_format'], ['GET' => 0], null, false, true, null]],
        451 => [
            [['_route' => 'api_ratings_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ratings', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_ratings_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ratings', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        489 => [
            [['_route' => 'api_ratings_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ratings', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_ratings_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ratings', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_ratings_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ratings', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        524 => [
            [['_route' => 'api_roles_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_roles_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        562 => [
            [['_route' => 'api_roles_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_roles_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_roles_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        633 => [
            [['_route' => 'api_n_preferred_time_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTimeTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_preferred_time_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTimeTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        671 => [
            [['_route' => 'api_n_preferred_time_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTimeTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_preferred_time_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTimeTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_preferred_time_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTimeTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        703 => [
            [['_route' => 'api_n_preferred_times_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTime', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_preferred_times_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTime', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        741 => [
            [['_route' => 'api_n_preferred_times_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTime', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_preferred_times_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTime', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_preferred_times_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTime', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        793 => [
            [['_route' => 'api_n_personality_styles_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyle', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_personality_styles_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyle', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        831 => [
            [['_route' => 'api_n_personality_styles_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyle', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_personality_styles_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyle', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_personality_styles_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyle', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        875 => [
            [['_route' => 'api_n_personality_style_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyleTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_personality_style_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyleTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        913 => [
            [['_route' => 'api_n_personality_style_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyleTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_personality_style_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyleTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_personality_style_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyleTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        970 => [
            [['_route' => 'api_n_feedback_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedbackTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_feedback_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedbackTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1008 => [
            [['_route' => 'api_n_feedback_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedbackTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_feedback_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedbackTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_feedback_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedbackTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1041 => [
            [['_route' => 'api_n_feedbacks_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedback', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_feedbacks_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedback', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1080 => [
            [['_route' => 'api_n_feedbacks_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedback', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_feedbacks_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedback', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_feedbacks_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedback', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1143 => [
            [['_route' => 'api_n_specic_outcome_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcomeTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_specic_outcome_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcomeTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1182 => [
            [['_route' => 'api_n_specic_outcome_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcomeTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_specic_outcome_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcomeTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_specic_outcome_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcomeTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1215 => [
            [['_route' => 'api_n_specic_outcomes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcome', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_specic_outcomes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcome', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1254 => [
            [['_route' => 'api_n_specic_outcomes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcome', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_specic_outcomes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcome', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_specic_outcomes_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcome', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1316 => [
            [['_route' => 'api_n_level_urgency_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgencyTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_level_urgency_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgencyTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1355 => [
            [['_route' => 'api_n_level_urgency_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgencyTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_level_urgency_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgencyTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_level_urgency_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgencyTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1390 => [
            [['_route' => 'api_n_level_urgencies_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgency', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_level_urgencies_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgency', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1429 => [
            [['_route' => 'api_n_level_urgencies_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgency', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_level_urgencies_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgency', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_level_urgencies_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgency', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1466 => [
            [['_route' => 'api_n_days_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDays', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_days_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDays', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1505 => [
            [['_route' => 'api_n_days_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDays', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_days_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDays', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_days_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDays', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1549 => [
            [['_route' => 'api_n_days_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDaysTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_days_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDaysTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1588 => [
            [['_route' => 'api_n_days_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDaysTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_days_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDaysTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_days_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDaysTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1642 => [
            [['_route' => 'api_n_goals_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoalsTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_goals_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoalsTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1684 => [
            [['_route' => 'api_n_goals_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoalsTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_goals_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoalsTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_goals_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoalsTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1726 => [[['_route' => 'api_n_goals_translations_language_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Language', '_api_subresource_operation_name' => 'api_n_goals_translations_language_get_subresource', '_api_subresource_context' => ['property' => 'language', 'identifiers' => [['id', 'App\\Entity\\NGoalsTranslation', true]], 'collection' => false, 'operationId' => 'api_n_goals_translations_language_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1755 => [
            [['_route' => 'api_n_goals_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_goals_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1794 => [
            [['_route' => 'api_n_goals_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_goals_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_goals_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1834 => [
            [['_route' => 'api_n_tasks_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_tasks_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1873 => [
            [['_route' => 'api_n_tasks_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_tasks_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_tasks_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1918 => [
            [['_route' => 'api_n_task_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTaskTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_task_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTaskTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1957 => [
            [['_route' => 'api_n_task_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTaskTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_task_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTaskTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_task_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTaskTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2004 => [
            [['_route' => 'api_n_compliments_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NCompliment', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_compliments_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NCompliment', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2043 => [
            [['_route' => 'api_n_compliments_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NCompliment', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_compliments_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NCompliment', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_compliments_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NCompliment', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2088 => [
            [['_route' => 'api_n_compliment_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NComplimentTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_compliment_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NComplimentTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2127 => [
            [['_route' => 'api_n_compliment_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NComplimentTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_compliment_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NComplimentTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_compliment_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NComplimentTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2185 => [
            [['_route' => 'api_n_available_translations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailableTranslation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_available_translations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailableTranslation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2224 => [
            [['_route' => 'api_n_available_translations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailableTranslation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_available_translations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailableTranslation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_available_translations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailableTranslation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2257 => [
            [['_route' => 'api_n_availables_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailable', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_availables_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailable', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2296 => [
            [['_route' => 'api_n_availables_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailable', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_n_availables_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailable', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_n_availables_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailable', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2355 => [[['_route' => 'api_n_preferred_times_frontend_item', '_controller' => 'App\\Controller\\NPreferredTime\\NPreferredTimeFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPreferredTime', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2389 => [[['_route' => 'api_n_personality_styles_frontend_item', '_controller' => 'App\\Controller\\NPersonalityStyle\\NPersonalityStyleFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NPersonalityStyle', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2422 => [[['_route' => 'api_n_specic_outcomes_frontend_item', '_controller' => 'App\\Controller\\NSpecicOutcome\\NSpecicOutcomeFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NSpecicOutcome', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2444 => [[['_route' => 'api_n_days_frontend_item', '_controller' => 'App\\Controller\\NDays\\NDaysFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NDays', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2467 => [[['_route' => 'api_n_tasks_frontend_item', '_controller' => 'App\\Controller\\NTask\\NTaskFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2498 => [[['_route' => 'api_n_level_urgencies_frontend_item', '_controller' => 'App\\Controller\\NLevelUrgency\\NLevelUrgencyFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NLevelUrgency', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2526 => [[['_route' => 'api_n_compliments_frontend_item', '_controller' => 'App\\Controller\\NCompliment\\NComplimentFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NCompliment', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2549 => [[['_route' => 'api_n_goals_frontend_item', '_controller' => 'App\\Controller\\NGoals\\NGoalsFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2576 => [[['_route' => 'api_n_availables_frontend_item', '_controller' => 'App\\Controller\\NAvailable\\NAvailableFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NAvailable', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2602 => [[['_route' => 'api_n_feedbacks_frontend_item', '_controller' => 'App\\Controller\\NFeedback\\NFeedbackFrontendGetItemAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\NFeedback', '_api_item_operation_name' => 'frontend', '_api_receive' => false], ['slug'], ['GET' => 0], null, false, true, null]],
        2633 => [[['_route' => 'api_members_loginByToken_item', '_controller' => 'App\\Controller\\Member\\MemberLoginByTokenCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_item_operation_name' => 'loginByToken', '_api_receive' => false], ['token'], ['GET' => 0], null, false, true, null]],
        2664 => [[['_route' => 'api_partners_loginByToken_item', '_controller' => 'App\\Controller\\Partner\\PartnerLoginByTokenCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_item_operation_name' => 'loginByToken', '_api_receive' => false], ['token'], ['GET' => 0], null, false, true, null]],
        2687 => [[['_route' => 'api_clients_loginByToken_item', '_controller' => 'App\\Controller\\Client\\ClientLoginByTokenCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'loginByToken', '_api_receive' => false], ['token'], ['GET' => 0], null, false, true, null]],
        2721 => [[['_route' => 'api_supervisors_loginByToken_item', '_controller' => 'App\\Controller\\Supervisor\\SupervisorLoginByTokenCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_item_operation_name' => 'loginByToken', '_api_receive' => false], ['token'], ['GET' => 0], null, false, true, null]],
        2753 => [[['_route' => 'api_files_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\File', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        2762 => [[['_route' => 'api_files_post_collection', '_controller' => 'App\\Controller\\CreateFileAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\File', '_api_collection_operation_name' => 'post', '_api_receive' => false], [], ['POST' => 0], null, false, false, null]],
        2800 => [
            [['_route' => 'api_files_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\File', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_files_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\File', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_files_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\File', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2844 => [
            [['_route' => 'api_modules_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Module', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_modules_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Module', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2883 => [
            [['_route' => 'api_modules_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Module', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_modules_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Module', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_modules_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Module', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2927 => [
            [['_route' => 'api_members_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_members_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2969 => [
            [['_route' => 'api_members_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_members_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_members_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Member', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3013 => [[['_route' => 'api_members_n_goals_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\NGoals', '_api_subresource_operation_name' => 'api_members_n_goals_get_subresource', '_api_subresource_context' => ['property' => 'nGoals', 'identifiers' => [['id', 'App\\Entity\\Member', true]], 'collection' => true, 'operationId' => 'api_members_n_goals_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        3042 => [[['_route' => 'api_members_n_tasks_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\NTask', '_api_subresource_operation_name' => 'api_members_n_tasks_get_subresource', '_api_subresource_context' => ['property' => 'nTask', 'identifiers' => [['id', 'App\\Entity\\Member', true]], 'collection' => true, 'operationId' => 'api_members_n_tasks_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        3084 => [
            [['_route' => 'api_member_goals_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberGoals', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_member_goals_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberGoals', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3123 => [
            [['_route' => 'api_member_goals_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberGoals', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_member_goals_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberGoals', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_member_goals_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberGoals', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3160 => [
            [['_route' => 'api_member_tasks_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberTask', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_member_tasks_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberTask', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3199 => [
            [['_route' => 'api_member_tasks_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberTask', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_member_tasks_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberTask', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_member_tasks_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\MemberTask', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3263 => [[['_route' => 'liip_imagine_filter_runtime', '_controller' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterRuntimeAction'], ['filter', 'hash', 'path'], ['GET' => 0], null, false, true, null]],
        3290 => [[['_route' => 'liip_imagine_filter', '_controller' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterAction'], ['filter', 'path'], ['GET' => 0], null, false, true, null]],
        3332 => [
            [['_route' => 'api_partners_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_partners_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3371 => [
            [['_route' => 'api_partners_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_partners_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_partners_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partner', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3410 => [
            [['_route' => 'api_groups_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Group', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groups_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Group', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3449 => [
            [['_route' => 'api_groups_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Group', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groups_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Group', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_groups_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Group', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3487 => [
            [['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_post_collection', '_controller' => 'App\\Controller\\User\\UserPostCollectionController', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3526 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'App\\Controller\\User\\UserPutItemController', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3565 => [[['_route' => 'api_histories_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\History', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        3595 => [[['_route' => 'api_histories_getEntity_collection', '_controller' => 'App\\Controller\\History\\HistoryGetEntityCollectionAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\History', '_api_collection_operation_name' => 'getEntity', '_api_receive' => false], ['entity', 'entityId'], ['GET' => 0], null, false, true, null]],
        3629 => [[['_route' => 'api_histories_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\History', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        3673 => [
            [['_route' => 'api_supervisors_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_supervisors_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3712 => [
            [['_route' => 'api_supervisors_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_supervisors_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_supervisors_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Supervisor', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3754 => [
            [['_route' => 'api_languages_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Language', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_languages_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Language', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3793 => [
            [['_route' => 'api_languages_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Language', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_languages_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Language', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_languages_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Language', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        3821 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        3868 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        3883 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        3904 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        3918 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        3929 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
