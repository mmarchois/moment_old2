# Base de données

## MCD


Le diagramme ci-dessous sera modifié au fur et à mesure de l'évolution du MCD.

```mermaid
classDiagram
direction LR

class User {
    uuid*: uuid
    firstName*: varchar[100]
    lastName*: varchar[100]
    email*: varchar[255]
    password*: varchar[255]
}

class Event {
    uuid*: uuid
    name*: varchar[100]
    fromDate*: datetime
    toDate*: datetime
}

class Category {
    uuid*: uuid
    title*: varchar[50]
    fromDate*: datetime
    toDate*: datetime
}

class Like {
    uuid*: uuid
}

class Comment {
    uuid*: uuid
    content*: varchar[255]
    createdAt*: datetime
}

class Participant {
    uuid*: uuid
    firstName*: varchar[100]
    lastName*: varchar[100]
    phoneNumber*: varchar[20]
    voucher*: varchar[255]
}

class Media {
    uuid*: uuid
    file*: varchar[155]
    createdAt*: datetime
}

User "1..N" -- "1..1" Event
Event "1..N" -- "1..1" Category
Event "1..N" -- "1..1" Participant
Media "0..1" -- "0..N" Category
Media "1..1" -- "1..N" Participant
Media "1..1" -- "1..N" Event
Media "1..1" -- "1..N" Comment
Media "1..N" -- "1..1" Like
Media "1..1" -- "1..N" Participant
Comment "1..1" -- "1..N" Participant
```

## Connexion

Pour se connecter au client PostgreSQL, utilisez la commande :

```bash
make dbshell
```

## Migrations

Lorsque vous effectuez des modifications sur les entités doctrine ainsi que sur les fichiers de mapping, vous devez générer une migration pour qu'elle soit versionnée.

Pour générer une migration, utilisez la commande :

```bash
make dbmigration
```

Une fois la migration générée, il faut l'executer. Pour ce faire il existe la commande suivante qui va prendre l'ensemble des migrations non jouées et les executer une à une.

```bash
make dbmigrate
```
