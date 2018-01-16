SELECT token FROM androidtokens WHERE androidtokens.tabid = 
(SELECT tabid FROM tabmachineallocation Where tabmachineallocation.machineNumber='A01')
