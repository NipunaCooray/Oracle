SELECT  piece_out_notifications.id,piece_out_notifications.machineNumber,piece_out_notifications.timestamp 
FROM `piece_out_notifications`
WHERE piece_out_notifications.status='sent' AND piece_out_notifications.machineNumber IN 
(SELECT tabmachineallocation.machineNumber FROM tabmachineallocation WHERE tabmachineallocation.tabid =(
SELECT tabid FROM androidtokens Where androidtokens.imei_number= '123456789'))