-- SeatGo Database Seed Data
USE seatgo_db;

-- Insert demo user (password: Demo@12345)
INSERT INTO users (name, email, password) VALUES 
('Demo User', 'demo@seatgo.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Insert demo tasks for the demo user
INSERT INTO tasks (user_id, title, description, status, due_date) VALUES 
(1, 'Confirm seat reservation', 'Verify seat availability for Route A-101', 'pending', '2024-01-15'),
(1, 'Issue boarding pass', 'Generate and send boarding pass to customer', 'in_progress', '2024-01-12'),
(1, 'Process payment', 'Complete payment verification for booking #12345', 'completed', '2024-01-10'),
(1, 'Update bus schedule', 'Modify departure time for Route B-205', 'pending', '2024-01-18'),
(1, 'Customer support follow-up', 'Contact customer regarding seat upgrade request', 'in_progress', '2024-01-14');

-- Insert motivational quotes
INSERT INTO quotes (text, author) VALUES 
('The journey of a thousand miles begins with one step.', 'Lao Tzu'),
('Success is not final, failure is not fatal: it is the courage to continue that counts.', 'Winston Churchill'),
('The only way to do great work is to love what you do.', 'Steve Jobs'),
('Innovation distinguishes between a leader and a follower.', 'Steve Jobs'),
('Your limitation—it''s only your imagination.', 'Unknown'),
('Push yourself, because no one else is going to do it for you.', 'Unknown'),
('Great things never come from comfort zones.', 'Unknown'),
('Dream it. Wish it. Do it.', 'Unknown'),
('Success doesn''t just find you. You have to go out and get it.', 'Unknown'),
('The harder you work for something, the greater you''ll feel when you achieve it.', 'Unknown'),
('Dream bigger. Do bigger.', 'Unknown'),
('Don''t stop when you''re tired. Stop when you''re done.', 'Unknown');
