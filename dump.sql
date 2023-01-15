create database bazar;

use bazar;

create table prispevoks
(
    id      int auto_increment,
    obrazok text not null,
    nazov   text not null,
    text    text not null,
    constraint prispevoks_pk
        primary key (id)
);