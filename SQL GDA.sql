CREATE database GDA CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
use GDA;

create table comptes(
id_compte int auto_increment primary key not null,
login_compte varchar(50) not null,
password_compte varchar(100) not null,
auth_compte varchar(100) not null,
estValide bool not null
)engine=InnoDB;

create table projets(
id_projet int auto_increment primary key not null,
nom_projet varchar(255) not null,
id_compte int not null,
id_activite int null
)engine=InnoDB;

create table activites(
id_activite int auto_increment primary key not null,
nom_activite varchar(255) not null,
temps_activite float not null,
id_compte int not null,
id_freq int not null
)engine=InnoDB;

create table frequences(
id_freq int auto_increment primary key not null,
intituler_freq varchar(50) not null
)engine=InnoDB;

create table notes (
id_note int auto_increment primary key not null,
contenu_note text not null,
date_note datetime not null,
estTerminer bool not null,
id_cat int not null,
id_activite int null,
id_projet int null,
id_compte int not null
)engine=InnoDB;

create table categories(
id_cat int auto_increment primary key not null,
intituler_cat varchar(50) not null
)engine=InnoDB;


create table taches(
id_tache int auto_increment primary key not null,
date_tache datetime not null,
duree_tache float not null,
id_note int not null
)engine=InnoDB;

create table rappels(
id_rappel int auto_increment primary key not null,
date_rappel date not null,
heure_rappel time not null,
id_note int not null
)engine=InnoDB;

create table rdv(
id_rdv int auto_increment primary key not null,
date_rdv date not null,
heure_rdv time not null,
lieu_rdv varchar(255),
id_note int not null
)engine=InnoDB;

alter table projets
add constraint fk_avoir_compte
foreign key (id_compte)
references comptes(id_compte);

alter table projets
add constraint fk_ourdir_activite
foreign key(id_activite)
references activites(id_activite);

alter table activites
add constraint fk_profiter_compte
foreign key (id_compte)
references comptes(id_compte);

alter table activites
add constraint fk_repeter_frequence
foreign key(id_freq)
references frequences (id_freq);

alter table notes
add constraint fk_assujetir_categorie
foreign key(id_cat)
references categories(id_cat);

alter table notes
add constraint fk_appartenir_activite
foreign key(id_activite)
references activites(id_activite);

alter table notes
add constraint fk_seoir_projet
foreign key(id_projet)
references projets(id_projet);

alter table notes
add constraint fk_ecrivailler_compte
foreign key(id_compte)
references comptes(id_compte);

alter table taches
add constraint fk_prester_note
foreign key (id_note)
references notes(id_note);

alter table rappels
add constraint fk_rappeller_note
foreign key (id_note)
references notes(id_note);

alter table rdv
add constraint fk_etre_note
foreign key (id_note)
references notes(id_note);


INSERT INTO `gda`.`categories` (`intituler_cat`) VALUES ('note');
INSERT INTO `gda`.`categories` (`intituler_cat`) VALUES ('tache');
INSERT INTO `gda`.`categories` (`intituler_cat`) VALUES ('rappel');
INSERT INTO `gda`.`categories` (`intituler_cat`) VALUES ('RDV');

INSERT INTO `gda`.`frequences` (`intituler_freq`) VALUES ('par jour');
INSERT INTO `gda`.`frequences` (`intituler_freq`) VALUES ('par semaine');
INSERT INTO `gda`.`frequences` (`intituler_freq`) VALUES ('par mois');
INSERT INTO `gda`.`frequences` (`intituler_freq`) VALUES ('par an');