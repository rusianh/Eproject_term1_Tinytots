create
    definer = db2007u1@`%` procedure proc_admin_update(IN UserName_Ip varchar(50))
BEGIN 
	UPDATE Admins SET Password = Password_Ip
		WHERE UserName = UserName_Ip;
END;

