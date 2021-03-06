-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER="root"@"localhost" PROCEDURE "Win_Upload_ProjectId"(
in _user_id int,
out _return int)
this : BEGIN

	declare p_id int default 0;  

	select GET_SEQUENCE('project') into p_id;
    
    if p_id = -1 then
		set _return = -1;
        leave this;
    end if;

	insert into project(project_id, project_status_id, project_creator) values (p_id, 1, _user_id);
	
	set _return = p_id;
END