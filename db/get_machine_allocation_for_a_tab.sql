SELECT  DISTINCT machineNumber
FROM `tabmachineallocation` 
WHERE tabmachineallocation.tabid= (SELECT androidtokens.tabid FROM `androidtokens` WHERE androidtokens.imei_number= '123456789' ) 
Order By timeadded DESC

