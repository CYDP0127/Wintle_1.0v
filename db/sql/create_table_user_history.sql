create table user_history (
	subject_id	 int,
	type_id 	int,
	object_id	int,
	complement_id int,
	date timestamp default current_timestamp,
	foreign key(type_id) references history_type(type_id),
	foreign key(complement_id) references complement_type(complement_id)
);
