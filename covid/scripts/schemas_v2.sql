CREATE DATABASE COVID2 OWNER JOHAN;

create table country (
    id serial primary key,
    country_name varchar(50) not null
);

create table evolution (
    id serial primary key,
    country_id int,
    new int,
    death int,
    recovered int,
    date timestamp not null,
    constraint fk_case_country foreign key (country_id) references country(id),
    constraint nb_new check(new > -1),
    constraint nb_death check(death > -1),
    constraint nb_recovered check(recovered > -1)
);

create table admin (
    id serial primary key,
    username varchar(50) not null,
    pass varchar(40) not null
);

insert into admin (username, pass) values
('admin', md5('admin'));

create table login (
    id serial primary key,
    token varchar(40) not null,
    expiration timestamp not null
);

insert into country (country_name) values
('madagascar'),('inde');

insert into evolution (country_id, new, death, recovered, date) values
(1, '10', 1, 4, '2021-05-01 00:00:00'),
(1, '10', 1, 4, '2021-05-01 00:00:00'),
(1, '10', 1, 4, '2021-05-02 00:00:00'),
(2, '20', 5, 0, '2021-05-01 00:00:00'),
(2, '20', 5, 0, '2021-05-01 00:00:00'),
(2, '20', 5, 0, '2021-05-02 00:00:00'),
(2, '20', 5, 0, '2021-05-03 00:00:00');

create or replace view v_init_evolution_country AS
    select e.id, c.id country_id, coalesce(e.new, 0) as new, coalesce(e.death, 0) as death, coalesce(e.recovered, 0) as recovered, date(coalesce(e.date, current_timestamp)) as date
    from country c
    left join evolution e on e.country_id = c.id ;

create or replace view v_sum_evolution as
    select country_id, sum(new) as confirmed, sum(death) as death, sum(recovered) as recovered
    from v_init_evolution_country
    group by country_id;

create or replace view v_sum_evolution_r as
    select c.country_name, e.*, e.confirmed-(e.death+e.recovered) as active_case
    from v_sum_evolution e
    join country c on c.id = e.country_id;

create or replace view v_resume_evolution as
    select sum(confirmed) as confirmed, sum(death) as death, sum(recovered) as recovered, sum(active_case) as active_case
    from v_sum_evolution_r;

create table news (
    id serial primary key,
    title varchar(100) not null,
    content text not null,
    imagelink varchar,
    date timestamp not null
);