--database: StoriesDB

CREATE TABLE stories(
    id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    author TEXT NOT NULL,
    story TEXT NOT NULL
);