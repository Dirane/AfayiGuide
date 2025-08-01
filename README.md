# AfayiGuide - Your Path to Success

A Progressive Web App (PWA) built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) to support GCE A-Level and HND graduates in Cameroon as they transition to university or degree programs.

## 🎯 Mission

AfayiGuide aims to bridge the gap between secondary education and higher learning by providing comprehensive support, resources, and guidance to students in Cameroon.

## ✨ Features

### Core Functionalities

- **Program Finder** – Search and filter university/degree programs by location, field, tuition, and more
- **PathFinder Intake Form** – Collect student background, goals, and aspirations to suggest study paths
- **1-on-1 Mentorship Booking** – Students schedule sessions with mentors/counselors
- **Pathway Report Generator** – Generate and deliver personalized study & career roadmap (PDF or web view)
- **Opportunities Board** – Scholarships, internships, jobs, admissions, and more
- **Secure Payments** – Integration with MTN/Orange Money or PayPal for premium sessions and services
- **Admin Dashboard** – Manage users, mentors, programs, and posted opportunities

### User Roles

- **Student** – Access programs, take assessments, book mentorship sessions
- **Mentor** – Provide guidance, manage sessions, share expertise
- **Admin** – Manage platform, users, content, and analytics
- **Partner** – Post opportunities, manage partnerships

### PWA Features

- **Installable** – Add to home screen on mobile devices
- **Offline Mode** – Core functionality works without internet
- **Push Notifications** – Stay updated with opportunities and sessions
- **Mobile-First** – Optimized for low-end devices

## 🎨 Design System

### Colors
- **Primary**: #0D1F3C (Dark Blue)
- **Accent**: #D95D39 (Burnt Orange)

### Typography
- **Font**: Inter (Google Fonts)
- **Weights**: 300, 400, 500, 600, 700

## 🛠️ Technology Stack

### Backend
- **Laravel 12** – PHP framework
- **Livewire 3** – Full-stack framework for Laravel
- **MySQL/SQLite** – Database
- **Laravel Breeze** – Authentication

### Frontend
- **Tailwind CSS** – Utility-first CSS framework
- **Alpine.js** – Lightweight JavaScript framework
- **Inter Font** – Typography

### PWA
- **Service Worker** – Offline functionality
- **Web App Manifest** – Installation support
- **Push Notifications** – Real-time updates

## 🚀 Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm
- MySQL/SQLite

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd afayiguide
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=ProgramSeeder
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

## 📱 PWA Installation

### For Users
1. Visit the website on a mobile device
2. Look for the "Add to Home Screen" prompt
3. Or manually add via browser menu

### For Developers
- Service Worker: `/public/sw.js`
- Manifest: `/public/manifest.json`
- Offline Page: `/public/offline.html`

## 🗄️ Database Schema

### Core Tables
- `users` – User accounts with roles (student, mentor, admin, partner)
- `programs` – University/degree programs
- `mentorship_sessions` – Booking sessions between students and mentors
- `opportunities` – Scholarships, internships, jobs
- `pathfinder_responses` – Student assessment responses

## 🔧 Development

### Livewire Components
- `ProgramFinder` – Search and filter programs
- `PathFinder` – Multi-step assessment form

### Key Features
- **Mobile-first responsive design**
- **Real-time search and filtering**
- **Progressive form validation**
- **PDF report generation**
- **PWA offline support**

## 📊 Performance Optimization

### Mobile Optimization
- **Lazy loading** for images and content
- **Minified assets** for faster loading
- **Service worker caching** for offline access
- **Optimized database queries** with eager loading

### Low-End Device Support
- **Lightweight JavaScript** with Alpine.js
- **Efficient CSS** with Tailwind's purge
- **Compressed images** and assets
- **Minimal network requests**

## 🔐 Security Features

- **CSRF protection** on all forms
- **Input validation** and sanitization
- **Role-based access control**
- **Secure file uploads**
- **SQL injection prevention**

## 📈 Analytics & Monitoring

### User Analytics
- Program search patterns
- Assessment completion rates
- Mentorship session bookings
- Opportunity application rates

### Performance Metrics
- Page load times
- Offline usage statistics
- PWA installation rates
- User engagement metrics

## 🤝 Contributing

### Development Guidelines
1. Follow Laravel coding standards
2. Write tests for new features
3. Use Livewire for interactive components
4. Maintain mobile-first approach
5. Ensure PWA compatibility

### Code Style
- **PHP**: PSR-12 standards
- **JavaScript**: ES6+ with Alpine.js
- **CSS**: Tailwind utility classes
- **Blade**: Laravel conventions

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Laravel Team** – For the amazing framework
- **Livewire Team** – For the reactive components
- **Tailwind CSS** – For the utility-first CSS
- **Alpine.js** – For lightweight JavaScript
- **Cameroon Education Community** – For inspiration and feedback

## 📞 Support

For support, email info@afayiguide.com or create an issue in the repository.

---

**Built with ❤️ for students in Cameroon**
