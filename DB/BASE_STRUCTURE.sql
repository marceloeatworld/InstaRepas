-- Food categories table (meat, fish, etc.)
CREATE TABLE food_categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);
INSERT INTO food_categories (name)

VALUES ('Meat'), ('Fish'), ('Vegetables'), ('Fruits'), ('Grains'), ('Dairy'), ('Nuts'), ('Oils'), ('Eggs'), ('Bread');

-- Seasons table
CREATE TABLE seasons (
    id INT PRIMARY KEY AUTO_INCREMENT,
    season_name VARCHAR(50) NOT NULL UNIQUE
);
INSERT INTO seasons (season_name)
VALUES ('Winter'), ('Spring'), ('Summer'), ('Autumn');
-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE,
    remember_token VARCHAR(100) NULL
);

INSERT INTO users (username, email, password, registration_date, is_admin, first_name, last_name, remember_token)
VALUES ('me', 'me@me.me', '123', NOW(), TRUE, 'John', 'Doe', NULL);


-- Dietary restrictions table
CREATE TABLE dietary_restrictions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name ENUM('contains_meat', 'contains_pork', 'contains_gluten', 'contains_animal_products', 'contains_lactose', 'contains_fish') NOT NULL UNIQUE
);


-- Foods table
CREATE TABLE foods (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    user_id INT,
    is_valid BOOLEAN DEFAULT FALSE,
    nutritional_type ENUM('proteins', 'carbohydrates', 'fibers', 'fruits', 'lipids'),
    FOREIGN KEY (category_id) REFERENCES food_categories(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (category_id),
    INDEX (user_id)
);

-- Users preferences table
CREATE TABLE user_preferences (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    preference_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (preference_id) REFERENCES dietary_restrictions(id),
    INDEX (user_id),
    INDEX (preference_id)
);

-- Foods and dietary restrictions association table
CREATE TABLE foods_restrictions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    food_id INT,
    restriction_id INT,
    FOREIGN KEY (food_id) REFERENCES foods(id),
    FOREIGN KEY (restriction_id) REFERENCES dietary_restrictions(id),
    INDEX (food_id),
    INDEX (restriction_id)
);

-- Meal combinations table
CREATE TABLE meal_combinations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    meal_type ENUM('breakfast', 'other_meals', 'snack')
);

-- Foods and meal combinations association table
CREATE TABLE combinations_foods (
    id INT PRIMARY KEY AUTO_INCREMENT,
    combination_id INT,
    food_id INT,
    FOREIGN KEY (combination_id) REFERENCES meal_combinations(id),
    FOREIGN KEY (food_id) REFERENCES foods(id)
);

-- Recipe categories table
CREATE TABLE recipe_categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name ENUM('starter', 'main_course', 'dessert') NOT NULL UNIQUE
);

-- Recipes table
CREATE TABLE recipes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    preparation_steps TEXT,
    preparation_time INT,
    cooking_time INT,
    servings INT,
    recipe_category_id INT,
    creation_date DATETIME NOT NULL,
    image_url VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (recipe_category_id) REFERENCES recipe_categories(id),
    INDEX (user_id),
    INDEX (recipe_category_id)
);

-- Recipes and dietary restrictions association table
CREATE TABLE recipes_restrictions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    recipe_id INT,
    restriction_id INT,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id),
    FOREIGN KEY (restriction_id) REFERENCES dietary_restrictions(id),
    INDEX (recipe_id),
    INDEX (restriction_id)
);

-- Foods and recipes association table
CREATE TABLE recipes_foods (
    id INT PRIMARY KEY AUTO_INCREMENT,
    recipe_id INT,
    food_id INT,
    quantity DECIMAL(10, 2),
    unit_of_measure VARCHAR(50),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id),
    FOREIGN KEY (food_id) REFERENCES foods(id),
    INDEX (recipe_id),
    INDEX (food_id)
);

-- Foods and seasons association table
CREATE TABLE foods_seasons (
    id INT PRIMARY KEY AUTO_INCREMENT,
    food_id INT,
    season_id INT,
    FOREIGN KEY (food_id) REFERENCES foods(id),
    FOREIGN KEY (season_id) REFERENCES seasons(id),
    INDEX (food_id),
    INDEX (season_id)
);
