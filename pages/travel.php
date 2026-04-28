<?php
$page_security = 'SA_TRAVEL'; $path_to_root = "../../..";
include_once($path_to_root . "/includes/session.inc");
include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/modules/FA_TravelExpense/includes/travel_db.inc");
page(_("Travel & Expense"), false, false, "", "");
$requests = get_travel_requests(['employee_id' => $_SESSION["wa_user"]->employee_id]);
start_table(TABLESTYLE);
table_header([_('Purpose'), _('Dates'), _('Est. Cost'), _('Status')]);
while ($r = db_fetch($requests)) { alt_table_row($r); label_cell($r['purpose']); label_cell(sql2date($r['start_date']).' - '.sql2date($r['end_date'])); label_cell($r['estimated_cost']?:'-'); label_cell($r['status']); }
end_table(1); end_page(true);