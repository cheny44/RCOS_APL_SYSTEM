USE APL;

# 5 clients
INSERT INTO Client (first_name, last_name, age)
VALUES ('Client1', 'Client11', 1);
INSERT INTO Client (first_name, last_name, age)
VALUES ('Client2', 'Client12', 2);
INSERT INTO Client (first_name, last_name, age)
VALUES ('Client3', 'Client13', 3);
INSERT INTO Client (first_name, last_name, age)
VALUES ('Client4', 'Client14', 4);
INSERT INTO Client (first_name, last_name, age)
VALUES ('Client5', 'Client15', 5);

# 5 branches
INSERT INTO Branch (branch_name, reporter, branch_description)
VALUES('Branch1', 'someone1', 'north');
INSERT INTO Branch (branch_name, reporter, branch_description)
VALUES('Branch2', 'someone2', 'south');
INSERT INTO Branch (branch_name, reporter, branch_description)
VALUES('Branch3', 'someone3', 'west');
INSERT INTO Branch (branch_name, reporter, branch_description)
VALUES('Branch4', 'someone4', 'east');
INSERT INTO Branch (branch_name, reporter, branch_description)
VALUES('Branch5', 'someone5', 'center');

# 1 color
INSERT INTO Color(color_description)
VALUES ('red, violent');

# Dummy PermanentBan
INSERT INTO Permanent_Ban(pb_start_date,
                          pb_end_date,
                          pb_description,
                          pb_add_note)
VALUES('1000-01-01','NONE','NONE','NONE');

# pb 2 and 3
INSERT INTO Permanent_Ban(pb_start_date,
                          pb_end_date,
                          pb_description,
                          pb_add_note,
                          client_id)
VALUES('2000-01-01', 'pb1', 'pb11', 'pb111', 1);

INSERT INTO Permanent_Ban(pb_start_date,
                          pb_end_date,
                          pb_description,
                          pb_add_note,
                          client_id)
VALUES('2000-02-02', 'pb2', 'pb22', 'pb222', 2);

# Dummy ActiveBan
INSERT INTO Active_Ban(ab_start_date,
                       ab_end_date,
                       ab_description,
                       ab_add_note)
VALUES('1000-01-01','1000-01-01','NONE','NONE');

INSERT INTO Active_Ban(ab_start_date,
                       ab_end_date,
                       ab_description,
                       ab_add_note)
VALUES('2001-01-01','2001-01-02','ab1','ab11');

INSERT INTO Active_Ban(ab_start_date,
                       ab_end_date,
                       ab_description,
                       ab_add_note)
VALUES('2001-01-01','2001-01-02','ab2','ab22');

# 2 incidents
INSERT INTO Incident (incident_description,
                      affected_group,
                      Notes,
                      date_time,
                      client_id,
                      branch_id,
                      pb_id,
                      ab_id,
                      color_id)
VALUES('nothing', 'nobody', 'none', '1997-05-24', 1, 1, 1, 1, 1);
INSERT INTO Incident (incident_description,
                      affected_group,
                      Notes,
                      date_time,
                      client_id,
                      pb_id,
                      ab_id,
                      branch_id,
                      color_id)
VALUES('nothing2', 'nobody2', 'none2', '1997-10-24', 2, 2, 1, 1, 2);
