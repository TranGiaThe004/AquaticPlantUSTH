CREATE DATABASE aquatic_plant_advisor;
GO

USE aquatic_plant_advisor;
GO

CREATE TABLE users (
    id BIGINT IDENTITY(1,1) NOT NULL,
    name NVARCHAR(255) NOT NULL,
    email NVARCHAR(255) NOT NULL,
    email_verified_at DATETIME2 NULL,
    password NVARCHAR(255) NOT NULL,
    role NVARCHAR(20) NOT NULL CONSTRAINT DF_users_role DEFAULT 'user',
    status NVARCHAR(20) NOT NULL CONSTRAINT DF_users_status DEFAULT 'active',
    avatar NVARCHAR(255) NULL,
    bio NVARCHAR(MAX) NULL,
    remember_token NVARCHAR(100) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    deleted_at DATETIME2 NULL,
    CONSTRAINT PK_users PRIMARY KEY (id),
    CONSTRAINT UQ_users_email UNIQUE (email),
    CONSTRAINT CK_users_role CHECK (role IN ('user','expert','admin')),
    CONSTRAINT CK_users_status CHECK (status IN ('active','blocked'))
);
GO

CREATE TABLE plants (
    id BIGINT IDENTITY(1,1) NOT NULL,
    name NVARCHAR(255) NOT NULL,
    description NVARCHAR(MAX) NULL,
    ph_min FLOAT NULL,
    ph_max FLOAT NULL,
    temp_min FLOAT NULL,
    temp_max FLOAT NULL,
    light_level NVARCHAR(20) NULL,
    difficulty NVARCHAR(20) NULL,
    image_sample NVARCHAR(255) NULL,
    care_guide NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_plants PRIMARY KEY (id),
    CONSTRAINT CK_plants_light_level CHECK (light_level IN ('low','medium','high') OR light_level IS NULL),
    CONSTRAINT CK_plants_difficulty CHECK (difficulty IN ('easy','medium','hard') OR difficulty IS NULL)
);
GO

CREATE TABLE tanks (
    id BIGINT IDENTITY(1,1) NOT NULL,
    user_id BIGINT NOT NULL,
    name NVARCHAR(255) NOT NULL,
    size NVARCHAR(50) NULL,
    length_cm SMALLINT NULL,
    width_cm SMALLINT NULL,
    height_cm SMALLINT NULL,
    volume_liters FLOAT NULL,
    substrate NVARCHAR(255) NULL,
    light NVARCHAR(255) NULL,
    co2 NVARCHAR(20) NOT NULL CONSTRAINT DF_tanks_co2 DEFAULT 'none',
    description NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_tanks PRIMARY KEY (id),
    CONSTRAINT CK_tanks_co2 CHECK (co2 IN ('none','liquid','diy','pressurized'))
);
GO

CREATE TABLE tank_plants (
    id BIGINT IDENTITY(1,1) NOT NULL,
    tank_id BIGINT NOT NULL,
    plant_id BIGINT NOT NULL,
    planted_at DATE NULL,
    position NVARCHAR(255) NULL,
    note NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    deleted_at DATETIME2 NULL,
    CONSTRAINT PK_tank_plants PRIMARY KEY (id),
    CONSTRAINT UQ_tank_plants_tank_plant UNIQUE (tank_id, plant_id)
);
GO

CREATE TABLE water_logs (
    id BIGINT IDENTITY(1,1) NOT NULL,
    tank_id BIGINT NOT NULL,
    logged_at DATETIME2 NOT NULL,
    ph FLOAT NULL,
    temperature FLOAT NULL,
    no3 FLOAT NULL,
    other_params NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    deleted_at DATETIME2 NULL,
    CONSTRAINT PK_water_logs PRIMARY KEY (id)
);
GO

CREATE TABLE water_log_reminders (
    id BIGINT IDENTITY(1,1) NOT NULL,
    tank_id BIGINT NOT NULL,
    enabled BIT NOT NULL CONSTRAINT DF_water_log_reminders_enabled DEFAULT 0,
    frequency NVARCHAR(30) NOT NULL CONSTRAINT DF_water_log_reminders_frequency DEFAULT 'weekly',
    preferred_time TIME NULL,
    start_date DATE NULL,
    next_due_at DATETIME2 NULL,
    last_sent_at DATETIME2 NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_water_log_reminders PRIMARY KEY (id)
);
GO

CREATE TABLE plant_logs (
    id BIGINT IDENTITY(1,1) NOT NULL,
    tank_plant_id BIGINT NOT NULL,
    logged_at DATE NOT NULL,
    height FLOAT NULL,
    status NVARCHAR(100) NULL,
    note NVARCHAR(MAX) NULL,
    image_path NVARCHAR(255) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    deleted_at DATETIME2 NULL,
    CONSTRAINT PK_plant_logs PRIMARY KEY (id)
);
GO

CREATE TABLE questions (
    id BIGINT IDENTITY(1,1) NOT NULL,
    user_id BIGINT NOT NULL,
    tank_id BIGINT NULL,
    title NVARCHAR(255) NOT NULL,
    content NVARCHAR(MAX) NOT NULL,
    image_path NVARCHAR(255) NULL,
    status NVARCHAR(20) NOT NULL CONSTRAINT DF_questions_status DEFAULT 'open',
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_questions PRIMARY KEY (id),
    CONSTRAINT CK_questions_status CHECK (status IN ('open','resolved'))
);
GO

CREATE TABLE answers (
    id BIGINT IDENTITY(1,1) NOT NULL,
    question_id BIGINT NOT NULL,
    user_id BIGINT NOT NULL,
    content NVARCHAR(MAX) NOT NULL,
    is_accepted BIT NOT NULL CONSTRAINT DF_answers_is_accepted DEFAULT 0,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_answers PRIMARY KEY (id)
);
GO

CREATE TABLE posts (
    id BIGINT IDENTITY(1,1) NOT NULL,
    user_id BIGINT NOT NULL,
    title NVARCHAR(255) NOT NULL,
    content NVARCHAR(MAX) NOT NULL,
    image_path NVARCHAR(255) NULL,
    status NVARCHAR(20) NOT NULL CONSTRAINT DF_posts_status DEFAULT 'pending',
    reviewed_by BIGINT NULL,
    reviewed_at DATETIME2 NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_posts PRIMARY KEY (id)
);
GO

CREATE TABLE comments (
    id BIGINT IDENTITY(1,1) NOT NULL,
    post_id BIGINT NOT NULL,
    user_id BIGINT NOT NULL,
    content NVARCHAR(MAX) NOT NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_comments PRIMARY KEY (id)
);
GO

CREATE TABLE plant_images (
    id BIGINT IDENTITY(1,1) NOT NULL,
    user_id BIGINT NULL,
    tank_id BIGINT NULL,
    purpose NVARCHAR(20) NOT NULL CONSTRAINT DF_plant_images_purpose DEFAULT 'library',
    plant_id BIGINT NOT NULL,
    image_path NVARCHAR(255) NOT NULL,
    feature_vector NVARCHAR(MAX) NULL,
    query_vector NVARCHAR(MAX) NULL,
    match_results NVARCHAR(MAX) NULL,
    note NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_plant_images PRIMARY KEY (id)
);
GO

CREATE TABLE identify_sessions (
    id BIGINT IDENTITY(1,1) NOT NULL,
    user_id BIGINT NOT NULL,
    tank_id BIGINT NULL,
    source_image_path NVARCHAR(255) NOT NULL,
    note NVARCHAR(MAX) NULL,
    merged_results NVARCHAR(MAX) NULL,
    confirmed_plants NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_identify_sessions PRIMARY KEY (id)
);
GO

CREATE TABLE identify_regions (
    id BIGINT IDENTITY(1,1) NOT NULL,
    identify_session_id BIGINT NOT NULL,
    crop_image_path NVARCHAR(255) NOT NULL,
    crop_box NVARCHAR(MAX) NULL,
    query_vector NVARCHAR(MAX) NULL,
    match_results NVARCHAR(MAX) NULL,
    proposal_source NVARCHAR(20) NOT NULL CONSTRAINT DF_identify_regions_proposal_source DEFAULT 'manual',
    proposal_score FLOAT NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_identify_regions PRIMARY KEY (id)
);
GO

CREATE TABLE iot_devices (
    id BIGINT IDENTITY(1,1) NOT NULL,
    tank_id BIGINT NOT NULL,
    name NVARCHAR(255) NOT NULL,
    device_uid NVARCHAR(100) NOT NULL,
    device_key_hash NVARCHAR(64) NOT NULL,
    is_active BIT NOT NULL CONSTRAINT DF_iot_devices_is_active DEFAULT 1,
    last_seen_at DATETIME2 NULL,
    meta NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_iot_devices PRIMARY KEY (id),
    CONSTRAINT UQ_iot_devices_device_uid UNIQUE (device_uid),
    CONSTRAINT UQ_iot_devices_device_key_hash UNIQUE (device_key_hash)
);
GO

CREATE TABLE sensors (
    id BIGINT IDENTITY(1,1) NOT NULL,
    iot_device_id BIGINT NOT NULL,
    type NVARCHAR(50) NOT NULL,
    name NVARCHAR(255) NOT NULL,
    unit NVARCHAR(30) NULL,
    is_active BIT NOT NULL CONSTRAINT DF_sensors_is_active DEFAULT 1,
    meta NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_sensors PRIMARY KEY (id),
    CONSTRAINT UQ_sensors_iot_device_type UNIQUE (iot_device_id, type)
);
GO

CREATE TABLE sensor_readings (
    id BIGINT IDENTITY(1,1) NOT NULL,
    tank_id BIGINT NOT NULL,
    sensor_id BIGINT NOT NULL,
    type NVARCHAR(50) NOT NULL,
    numeric_value DECIMAL(12,4) NULL,
    recorded_at DATETIME2 NOT NULL,
    raw_payload NVARCHAR(MAX) NULL,
    created_at DATETIME2 NULL,
    updated_at DATETIME2 NULL,
    CONSTRAINT PK_sensor_readings PRIMARY KEY (id)
);
GO

ALTER TABLE tanks
ADD CONSTRAINT FK_tanks_users
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE CASCADE;
GO

ALTER TABLE tank_plants
ADD CONSTRAINT FK_tank_plants_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE CASCADE;
GO

ALTER TABLE tank_plants
ADD CONSTRAINT FK_tank_plants_plants
FOREIGN KEY (plant_id) REFERENCES plants(id);
GO

ALTER TABLE water_logs
ADD CONSTRAINT FK_water_logs_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE CASCADE;
GO

ALTER TABLE water_log_reminders
ADD CONSTRAINT FK_water_log_reminders_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE CASCADE;
GO

ALTER TABLE plant_logs
ADD CONSTRAINT FK_plant_logs_tank_plants
FOREIGN KEY (tank_plant_id) REFERENCES tank_plants(id)
ON DELETE CASCADE;
GO

ALTER TABLE questions
ADD CONSTRAINT FK_questions_users
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE CASCADE;
GO

ALTER TABLE questions
ADD CONSTRAINT FK_questions_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE SET NULL;
GO

ALTER TABLE answers
ADD CONSTRAINT FK_answers_questions
FOREIGN KEY (question_id) REFERENCES questions(id)
ON DELETE CASCADE;
GO

ALTER TABLE answers
ADD CONSTRAINT FK_answers_users
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE CASCADE;
GO

ALTER TABLE posts
ADD CONSTRAINT FK_posts_users
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE CASCADE;
GO

ALTER TABLE posts
ADD CONSTRAINT FK_posts_reviewed_by_users
FOREIGN KEY (reviewed_by) REFERENCES users(id)
ON DELETE SET NULL;
GO

ALTER TABLE comments
ADD CONSTRAINT FK_comments_posts
FOREIGN KEY (post_id) REFERENCES posts(id)
ON DELETE CASCADE;
GO

ALTER TABLE comments
ADD CONSTRAINT FK_comments_users
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE CASCADE;
GO

ALTER TABLE plant_images
ADD CONSTRAINT FK_plant_images_plants
FOREIGN KEY (plant_id) REFERENCES plants(id)
ON DELETE CASCADE;
GO

ALTER TABLE plant_images
ADD CONSTRAINT FK_plant_images_users
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE SET NULL;
GO

ALTER TABLE plant_images
ADD CONSTRAINT FK_plant_images_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE SET NULL;
GO

ALTER TABLE identify_sessions
ADD CONSTRAINT FK_identify_sessions_users
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE CASCADE;
GO

ALTER TABLE identify_sessions
ADD CONSTRAINT FK_identify_sessions_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE SET NULL;
GO

ALTER TABLE identify_regions
ADD CONSTRAINT FK_identify_regions_identify_sessions
FOREIGN KEY (identify_session_id) REFERENCES identify_sessions(id)
ON DELETE CASCADE;
GO

ALTER TABLE iot_devices
ADD CONSTRAINT FK_iot_devices_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE CASCADE;
GO

ALTER TABLE sensors
ADD CONSTRAINT FK_sensors_iot_devices
FOREIGN KEY (iot_device_id) REFERENCES iot_devices(id)
ON DELETE CASCADE;
GO

ALTER TABLE sensor_readings
ADD CONSTRAINT FK_sensor_readings_tanks
FOREIGN KEY (tank_id) REFERENCES tanks(id)
ON DELETE CASCADE;
GO

ALTER TABLE sensor_readings
ADD CONSTRAINT FK_sensor_readings_sensors
FOREIGN KEY (sensor_id) REFERENCES sensors(id)
ON DELETE CASCADE;
GO

CREATE INDEX IX_answers_question_id ON answers(question_id);
CREATE INDEX IX_answers_user_id ON answers(user_id);
CREATE INDEX IX_comments_post_id ON comments(post_id);
CREATE INDEX IX_comments_user_id ON comments(user_id);
CREATE INDEX IX_identify_regions_session_created_at ON identify_regions(identify_session_id, created_at);
CREATE INDEX IX_identify_regions_session_source ON identify_regions(identify_session_id, proposal_source);
CREATE INDEX IX_identify_sessions_user_created_at ON identify_sessions(user_id, created_at);
CREATE INDEX IX_identify_sessions_tank_created_at ON identify_sessions(tank_id, created_at);
CREATE INDEX IX_iot_devices_tank_is_active ON iot_devices(tank_id, is_active);
CREATE INDEX IX_plant_images_plant_id ON plant_images(plant_id);
CREATE INDEX IX_plant_images_purpose ON plant_images(purpose);
CREATE INDEX IX_plant_images_user_created_at ON plant_images(user_id, created_at);
CREATE INDEX IX_plant_images_tank_created_at ON plant_images(tank_id, created_at);
CREATE INDEX IX_plant_logs_tank_plant_id ON plant_logs(tank_plant_id);
CREATE INDEX IX_posts_status_created_at ON posts(status, created_at);
CREATE INDEX IX_posts_user_created_at ON posts(user_id, created_at);
CREATE INDEX IX_posts_status ON posts(status);
CREATE INDEX IX_questions_user_id ON questions(user_id);
CREATE INDEX IX_questions_tank_id ON questions(tank_id);
CREATE INDEX IX_sensors_type ON sensors(type);
CREATE INDEX IX_sensor_readings_tank_type_recorded_at ON sensor_readings(tank_id, type, recorded_at);
CREATE INDEX IX_sensor_readings_sensor_recorded_at ON sensor_readings(sensor_id, recorded_at);
CREATE INDEX IX_tanks_user_id ON tanks(user_id);
CREATE INDEX IX_water_logs_tank_id ON water_logs(tank_id);
CREATE INDEX IX_water_logs_logged_at ON water_logs(logged_at);
CREATE INDEX IX_water_log_reminders_tank_id ON water_log_reminders(tank_id);
GO
