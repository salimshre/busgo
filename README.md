# SeatGo - Bus Reservation System

A clean and modern bus reservation system built with **PHP 8+, MySQL, HTML, CSS, and vanilla JavaScript**. SeatGo focuses on simplicity, security, and clear structure while providing a comprehensive task management system for bus reservation workflows.

## 🚌 Features

### Authentication System
- **User Registration** - Create new accounts with validation
- **Secure Login** - Session-based authentication with CSRF protection
- **Profile Management** - Display user information in navigation

### Task Management (CRUD)
- **Create Tasks** - Add new reservation-related tasks
- **View Tasks** - List all tasks with filtering and search
- **Update Tasks** - Edit task details and status
- **Delete Tasks** - Remove completed or unnecessary tasks
- **Status Tracking** - Pending, In Progress, Completed states
- **Due Date Management** - Set and track task deadlines

### Dashboard Features
- **Statistics Cards** - Total, Completed, In Progress, Pending tasks
- **Progress Visualization** - Animated progress bar with completion percentage
- **Daily Motivational Quotes** - Rotating inspirational messages
- **Upcoming Buses Widget** - Mock bus schedule with routes and availability
- **Overdue Task Alerts** - Notifications for tasks past due date

### Security & UX
- **CSRF Protection** - All forms protected against cross-site request forgery
- **XSS Prevention** - Output escaping for all user data
- **Input Validation** - Client-side and server-side validation
- **Flash Messages** - User feedback for all actions
- **Responsive Design** - Mobile-friendly interface

## 🎨 Design & Branding

- **App Name**: SeatGo
- **Primary Color**: #1E90FF (Dodger Blue)
- **Secondary Color**: #f0f0f0 (Light Gray)
- **Accent Color**: #FF6347 (Tomato)
- **Typography**: System fonts for optimal readability

## 📁 Project Structure

```
/
├── assets/
│   ├── styles.css          # Main stylesheet with SeatGo branding
│   └── app.js              # JavaScript functionality
├── config/
│   └── config.php          # Database and app configuration
├── controllers/
│   ├── AuthController.php  # Authentication logic
│   ├── DashboardController.php # Dashboard data and display
│   └── TaskController.php  # Task CRUD operations
├── core/
│   ├── Auth.php            # Authentication class
│   ├── Csrf.php            # CSRF token management
│   ├── Database.php        # PDO database wrapper
│   └── Helpers.php         # Utility functions
├── models/
│   ├── Quote.php           # Motivational quotes model
│   ├── Task.php            # Task data model
│   └── User.php            # User data model
├── sql/
│   ├── schema.sql          # Database structure
│   └── seed.sql            # Sample data
├── views/
│   ├── auth/
│   │   ├── login.php       # Login form
│   │   └── register.php    # Registration form
│   ├── dashboard/
│   │   └── index.php       # Dashboard page
│   ├── partials/
│   │   ├── flash.php       # Flash message display
│   │   ├── footer.php      # Page footer
│   │   ├── head.php        # HTML head section
│   │   └── header.php      # Navigation header
│   └── tasks/
│       ├── create.php      # Task creation form
│       ├── edit.php        # Task editing form
│       └── index.php       # Task listing
├── index.php               # Main router and entry point
└── README.md               # This file
```

## 🚀 Installation & Setup

### Requirements
- **PHP 8.0+** with PDO MySQL extension
- **MySQL 5.7+** or **MariaDB 10.2+**
- **Web server** (Apache, Nginx) or PHP built-in server

### Installation Steps

1. **Clone or download** the project files to your web directory

2. **Create the database**:
   ```sql
   CREATE DATABASE seatgo_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

3. **Import the database schema and seed data**:
   ```bash
   mysql -u your_username -p seatgo_db < sql/schema.sql
   mysql -u your_username -p seatgo_db < sql/seed.sql
   ```

4. **Configure database connection** in `config/config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'seatgo_db');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   ```

5. **Start the development server**:
   ```bash
   php -S localhost:8000 -t .
   ```

6. **Access the application** at `http://localhost:8000`

## 👤 Demo Account

Use these credentials to test the application:

- **Email**: `demo@seatgo.local`
- **Password**: `Demo@12345`

The demo account comes with 5 sample tasks to demonstrate the system functionality.

## 🗃️ Database Schema

### Users Table
- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `password` - Hashed password
- `created_at`, `updated_at` - Timestamps

### Tasks Table
- `id` - Primary key
- `user_id` - Foreign key to users
- `title` - Task title
- `description` - Task description (optional)
- `status` - pending, in_progress, completed
- `due_date` - Task deadline (optional)
- `created_at`, `updated_at` - Timestamps

### Quotes Table
- `id` - Primary key
- `text` - Quote content
- `author` - Quote author
- `created_at` - Timestamp

## 🛣️ Routes

| Route | Method | Description |
|-------|--------|-------------|
| `/` | GET | Redirect to dashboard (logged in) or login |
| `/login` | GET/POST | Login form and authentication |
| `/register` | GET/POST | Registration form and account creation |
| `/logout` | POST | User logout |
| `/dashboard` | GET | Main dashboard with stats and widgets |
| `/tasks` | GET | Task listing with filters |
| `/tasks/create` | GET/POST | Task creation form |
| `/tasks/edit?id=X` | GET/POST | Task editing form |
| `/tasks/delete` | POST | Task deletion |
| `/assets/*` | GET | Static assets (CSS, JS, images) |

## 🔒 Security Features

- **Password Hashing** - Using PHP's `password_hash()` with default algorithm
- **CSRF Protection** - All forms include CSRF tokens
- **XSS Prevention** - All output properly escaped
- **SQL Injection Prevention** - Prepared statements for all queries
- **Session Security** - Secure session configuration
- **Input Validation** - Both client-side and server-side validation

## 🎯 Usage Examples

### Creating a Task
1. Navigate to `/tasks`
2. Click "Add New Task"
3. Fill in title, description, status, and due date
4. Submit the form

### Filtering Tasks
- Use the status dropdown to filter by task status
- Use the search box to find tasks by title or description
- Filters are applied automatically

### Dashboard Overview
- View task statistics in colored cards
- Monitor progress with the animated progress bar
- Read daily motivational quotes
- Check upcoming bus schedules

## 🧪 Testing

### Manual Testing Checklist
- [ ] User registration with validation
- [ ] User login and logout
- [ ] Dashboard displays correct statistics
- [ ] Task creation, editing, and deletion
- [ ] Task filtering and search
- [ ] Progress bar updates correctly
- [ ] Daily quote rotation
- [ ] Responsive design on mobile
- [ ] CSRF protection on forms
- [ ] Direct route access without login redirects

### Sample Test Data
The seed file includes:
- 1 demo user account
- 5 sample tasks with different statuses
- 12 motivational quotes

## 🔧 Customization

### Adding New Quotes
Insert into the `quotes` table:
```sql
INSERT INTO quotes (text, author) VALUES 
('Your custom quote here', 'Author Name');
```

### Modifying Bus Data
Edit the `$upcomingBuses` array in `controllers/DashboardController.php`

### Styling Changes
Modify CSS variables in `assets/styles.css`:
```css
:root {
    --primary-color: #1E90FF;
    --secondary-color: #f0f0f0;
    --accent-color: #FF6347;
}
```

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
- Verify database credentials in `config/config.php`
- Ensure MySQL service is running
- Check database exists and user has permissions

**404 Errors for Assets**
- Ensure web server is configured to serve static files
- Check file permissions on `assets/` directory

**Session Issues**
- Verify PHP session configuration
- Check write permissions for session directory

**CSRF Token Errors**
- Ensure forms include `<?= Csrf::getTokenField() ?>`
- Check session is properly started

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📞 Support

For questions or issues:
- Check the troubleshooting section
- Review the code comments
- Create an issue in the repository

---

**SeatGo** - Your trusted bus reservation partner 🚌
