<?php
defined('NP_INITIALIZE') or exit('403 Forbidden');


$route['default_controller'] = 'Dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/']["POST"] = 'Dashboard/action';

$route['system/automation-settings']['GET'] = 'System/automationSettings';
$route['system/modules/get-template']['POST'] = 'System/getModuleView';
$route['system/modules/update']['POST'] = 'System/updateModuleSettings';
$route['system/modules/action']['POST'] = 'System/moduleActions';
$route["system/modules"]["GET"] = "System/moduleSettings";
$route["system/actions"]["POST"] = "System/action";
$route["system/plugins/action"]["POST"] = "System/pluginActions";
$route["system/settings"]["GET"] = "System/settings";
$route["system/activity-logs"]["GET"] = "ActivityLog/list";
$route["system/activity-logs"]["POST"] = "ActivityLog/action";
$route["logs/ajax"]["POST"] = "ActivityLog/ajax";
$route["system/financial/currencies"]["GET"] = "Currency/list";
$route["system/financial/currencies"]["POST"] = "Currency/action";
$route["system/financial/exchange-rates/(:num)"]["GET"] = "ExchangeRate/list/$1";
$route["system/financial/exchange-rates"]["GET"] = "ExchangeRate/list";
$route["system/financial/exchange-rates"]["POST"] = "ExchangeRate/action";
$route["system/sms-logs"]["GET"] = "SmsLog/list";
$route["system/sms-logs"]["POST"] = "SmsLog/action";
$route["system/sms-logs/ajax"]["POST"] = "SmsLog/ajax";
$route["system/email-logs"]["GET"] = "EmailLog/list";
$route["system/email-logs"]["POST"] = "EmailLog/action";
$route["system/email-logs/ajax"]["POST"] = "EmailLog/ajax";

$route['notification-templates']['GET'] = 'NotificationTemplate/index';
$route['notification-templates/edit/(:any)']['GET'] = 'NotificationTemplate/edit/$1';
$route['notification-templates/edit/(:any)']['POST'] = 'NotificationTemplate/editSubmit/$1';

/* User:START */
$route["generate-captcha"]["GET"] = "User/createCaptcha";
$route["auth/login"]["GET"] = "User/login";
$route["auth/login"]["POST"] = "User/loginPost";
$route["auth/logout"]["GET"] = "User/signOut";
$route["change-theme"]["POST"] = "User/changeTheme";
$route["users"]["GET"] = "User/list";
$route["users/(:num)"]["GET"] = "User/details/$1";
$route["users/add"]["POST"] = "User/add";
$route["users/my-profile"]["GET"] = "User/myProfile";
$route["archive/users"]["GET"] = "User/archive";
$route["archive/users/(:num)"]["GET"] = "User/details/$1";
/* User:END */

$route['exchange/rates/(:any)']['POST'] = 'ExchangeRate/rates/$1';

/* Role:START */
$route["roles"]["GET"] = "Role/list";
$route["roles/create"]["GET"] = "Role/create";
$route["roles/add"]["POST"] = "Role/add";
$route["roles/update"]["POST"] = "Role/update";
$route["roles/find"]["POST"] = "Role/find";
$route["roles/delete"]["POST"] = "Role/delete";
$route["roles/(:num)"]["GET"] = "Role/details/$1";
/* Role:END */

/* Customers:START */
$route["customers"]["GET"] = "Customer/list";
$route["customers/(:num)"]["GET"] = "Customer/details/$1";
$route["customers"]["POST"] = "Customer/action";
$route["customers/ajax"]["POST"] = "Customer/ajax";
$route["customers/search"]["POST"] = "Customer/search";
$route["archive/customers"]["GET"] = "Customer/archive";
$route["archive/customers/(:num)"]["GET"] = "Customer/details/$1";
/* Customers:END */

/* Potential Customers:START */
$route["potential-customers"]["GET"] = "PotentialCustomer/list";
$route["potential-customers/(:num)"]["GET"] = "PotentialCustomer/details/$1";
/* Potential Customers:END */

/* CustomerContact:START */
$route["customer-contacts/action"]["POST"] = "CustomerContact/action";
/* CustomerContact:END */

/* Suppliers:START */
$route["suppliers"]["GET"] = "Supplier/list";
$route["suppliers/(:num)"]["GET"] = "Supplier/details/$1";
$route["suppliers"]["POST"] = "Supplier/action";
$route["suppliers/ajax"]["POST"] = "Supplier/ajax";
$route["suppliers/search"]["POST"] = "Supplier/search";
$route["archive/suppliers"]["GET"] = "Supplier/archive";
$route["archive/suppliers/(:num)"]["GET"] = "Supplier/details/$1";
/* Suppliers:END */

/* CustomerGroup:START */
$route["customer-groups"]["GET"] = "CustomerGroup/list";
$route["customer-groups"]["POST"] = "CustomerGroup/action";
/* CustomerGroup:END */

/* Config:START */
$route["settings"]["GET"] = "Config/edit";
$route["settings"]["POST"] = "Config/update";
/* Config:END */

/* District:START */
$route["districts/search"]["POST"] = "District/search";
/* District:END */

/* Country:START */
$route["countries/search"]["POST"] = "Country/search";
/* Country:END */

/* Account:START */
$route["accounts"]["GET"] = "Account/list";
$route["accounts/(:num)"]["GET"] = "Account/details/$1";
$route["accounts"]["POST"] = "Account/action";
$route["account-activities"]["GET"] = "Account/accountActivities";
$route["archive/accounts"]["GET"] = "Account/archive";
$route["archive/accounts/(:num)"]["GET"] = "Account/details/$1";
/* Account:END */

/* Product:START */
$route["products"]["GET"] = "Product/list";
$route["products/search"]["POST"] = "Product/search";
$route["products"]["POST"] = "Product/action";
$route["products/(:num)"]["GET"] = "Product/details/$1";
$route["archive/products"]["GET"] = "Product/archive";
$route["archive/products/(:num)"]["GET"] = "Product/details/$1";
/* Product:END */

/* Sale:START */
$route["sales/create"]["GET"] = "Sale/add";
$route["sales/(:num)"]["GET"] = "Sale/edit/$1";
$route["sales/(:num)/edit"]["GET"] = "Sale/edit/$1";
$route["sales"]["GET"] = "Sale/list";
$route["sales"]["POST"] = "Sale/action";
$route["sales/ajax"]["POST"] = "Sale/ajax";
$route['view-invoice/(:num)/(:any)'] = 'Invoice/detail/$1/$2';
$route['view-invoice/(:num)/(:any)/pay']['POST'] = 'Invoice/pay/$1/$2';
$route["archive/sales"]["GET"] = "Sale/archive";
$route["archive/sales/(:num)"]["GET"] = "Sale/edit/$1";
$route['archive/view-invoice/(:num)/(:any)']['GET'] = 'Invoice/detail/$1/$2';
$route['archive/view-invoice/(:num)/(:any)/pay']['POST'] = 'Invoice/pay/$1/$2';
$route['invoice/pay-submit']['POST'] = 'Invoice/action';
$route['invoice/pay-submit/callback']['POST'] = 'Invoice/callBack';
/* Sale:END */

/* Offer:START */
$route["offers"]["GET"] = "Offer/list";
$route["offers/create"]["GET"] = "Offer/add";
$route["offers/ajax"]["POST"] = "Offer/ajax";
$route["offers/(:num)"]["GET"] = "Offer/edit/$1";
$route["offers/(:num)/action"]["POST"] = "Offer/madeOffer/$1";
/* Offer:END */

/* Expense:START */
$route["expenses/create"]["GET"] = "Expense/add";
$route["expenses/(:num)"]["GET"] = "Expense/edit/$1";
$route["expenses/(:num)/edit"]["GET"] = "Expense/edit/$1";
$route["expenses"]["GET"] = "Expense/list";
$route["expenses"]["POST"] = "Expense/action";
$route["expenses/ajax"]["POST"] = "Expense/ajax";
$route["archive/expenses"]["GET"] = "Expense/archive";
$route["archive/expenses/(:num)"]["GET"] = "Expense/edit/$1";
/* Expense:END */

/* Collect:START */
$route["collects"]["GET"] = "Collect/list";
$route["collects/ajax"]["POST"] = "Collect/ajax";
$route["collects"]["POST"] = "Collect/action";
/* Collect:END */

/* Collect:START */
$route['payments']['GET'] = 'Payment/list';
$route["payments/ajax"]["POST"] = "Payment/ajax";
$route["payments"]["POST"] = "Payment/action";
/* Collect:END */

/* Document:START */
$route["documents/dfm/show_original/(:num)"]["GET"] = "Document/defaultFMShow/$1";
$route["documents"]["GET"] = "Document/list";
$route["documents/show_original/(:num)"]["POST"] = "Document/showOriginal/$1";
$route["documents"]["POST"] = "Document/action";
$route["documents/ajax"]["POST"] = "Document/ajax";
/* Document:END */

$route["notes/ajax"]["POST"] = "Note/ajax";
$route["notes"]["POST"] = "Note/action";

$route["sale-statuses"]["GET"] = "Status/saleStatus";

$route["categories"]["GET"] = "Category/list";
$route["categories"]["POST"] = "Category/action";

$route["calendar"]["GET"] = "Calendar/index";
$route["calendar"]["POST"] = "Calendar/action";

/* Mission:START */
$route["missions"]["GET"] = "Mission/list";
$route["missions/ajax"]["POST"] = "Mission/ajax";
$route["missions/(:num)"]["GET"] = "Mission/details/$1";
$route["missions/create"]["GET"] = "Mission/add";
$route["missions"]["POST"] = "Mission/action";
/* Mission:END */

/* Project:START */
$route["projects"]["GET"] = "Project/list";
$route["projects/(:num)"]["GET"] = "Project/details/$1";
$route["projects/action"]["POST"] = "Project/action";
/* Project:END */

$route['notifications']['POST'] = 'Notification/action';
$route['notifications/(:num)']['GET'] = 'Notification/redirect/$1';

/* Stack Activity:START */
$route['stack-activityLog']['GET'] = 'StackActivity/list';
/* Stack Activity:END */

/* Bulk SMS:START */
$route['bulk-sms']['GET'] = 'BulkSms/list';
$route['bulk-sms']['POST'] = 'BulkSms/action';
/* Bulk SMS:END */
$route["ornek"]["GET"] = "Ornek/list";
$route["ornek/add"]["GET"] = "Ornek/add";
$route["ornek/delete"]["GET"] = "Ornek/delete";
$route['ornek/create'] = 'Ornek/create';
$route['ornek/find'] = 'Ornek/find';
$route['ornek/update']["POST"] = 'Ornek/update';
