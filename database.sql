CREATE TABLE IF NOT EXISTS inquiries (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    service VARCHAR(100),
    visit_date DATE,
    address TEXT,
    problem TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
