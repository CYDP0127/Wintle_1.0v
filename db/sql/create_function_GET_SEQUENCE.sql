DELIMITER $$ 
CREATE DEFINER=`root`@`localhost` FUNCTION `GET_SEQUENCE`(
  _type VARCHAR(255)
) RETURNS int(11)
BEGIN

 declare num int;

 
 if (_type <> "user" and _type <> "lyrics" and _type <> "audio" and _type <> "image") then
 RETURN (-1);	
 end if;
 	
 select lastest_number into num
 from sequence_list 
 where sequence_type = _type;
 
 set num = num + 1;
 
 UPDATE sequence_list SET lastest_number = num WHERE sequence_type = _type;
 
 RETURN (num);	
END