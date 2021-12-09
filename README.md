# PHP CRUD Application

## Date:6-12-2021
## Three days challenge
## Group Assignment:
- [Min Jie.](https://github.com/minjie0501)
- [Shreejan.](https://github.com/shreejanjoshi)
- [Neha.](https://github.com/nehahonrao)

## What is CRUD?

- When we are building web applications, we want our models to provide four basic types of functionality. Most models will have to be able to Create, Read, Update, and Delete. This is often abbreviated as CRUD.

- While is an old style of approaching applications, with new ways of thinking (Domain Driven Design, Event Driven Design) that are more flow based - CRUD is still a large portion of all the programs developed today.

## Task division

So, in first day of project we divied our work in three.

- Min Jie => classroom
- Shreejan => teachers
- Neha => students

## Must-have features
You have to provide the following pages for Students, Teacher & Class.

- A general overview of all records of that entity in a table
    * Each row should have a button to edit or delete the entity
    * This page should have a "create new" button
- A detailed overview of the selected entity
    * This should include a button to delete this entity
    * Edge case: A teacher cannot be removed if he is still assigned to a class
    * Edge case: If you remove a class, make sure to remove the link between the students and the class.
- A page to edit an existing entity
- A page to create a new entity

### Fields:
On the general overview table you can yourself decide what would be useful information to show.

On the detailed overview you have to provide the following information:

#### Student
- Name
- Email
- Class (with clickable link)
- Assigned teacher (clickable link - relation via class)

#### Teacher
- Name
- Email
- List of all students currently assigned to him (clickable link)

#### Class
- Name class (Giertz, Lamarr, ...)
- Location (Antwerp, Gent, Genk, Brussels, Liege)
- Assigned teacher (clickable link)
- List of assigned students (clickable link)

