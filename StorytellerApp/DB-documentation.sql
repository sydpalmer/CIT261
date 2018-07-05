--database: StoriesDB

CREATE TABLE user(
    user_id SERIAL PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
);

CREATE TABLE stories(
    id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    author TEXT NOT NULL,
    story TEXT NOT NULL,
    user_id INTEGER REFERENCES user(user_id)
);