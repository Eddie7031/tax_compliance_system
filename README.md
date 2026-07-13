# Tax Compliance & Reconciliation System

A comprehensive **Tax Compliance & Reconciliation System** developed using **Laravel 12** for Audit, Tax, and Advisory firms. The system is designed to streamline tax compliance, client management, document management, and reconciliation processes.

---

## 🚀 Features

### Client Management
- Register and manage clients
- Client profiles
- Active/Inactive status
- Industry categorization
- Contact management

### User Management
- Secure authentication
- Role-based access control
- User profile management

### Tax Compliance
- VAT Management
- PAYE Management
- Withholding Tax (WHT)
- Income Tax Management
- Filing status tracking
- Tax calendar

### Reconciliation
- VAT Sales Reconciliation
- VAT Purchases Reconciliation
- WHT Reconciliation
- Automatic matching of transactions
- Exception reporting
- Duplicate detection

### Document Management
- Upload client documents
- KRA PIN Certificates
- Certificate of Incorporation
- CR12
- Financial Statements
- Engagement Letters
- Tax Compliance Certificates

### Reports
- Client Reports
- VAT Reports
- WHT Reports
- Tax Compliance Reports
- Reconciliation Reports
- Audit Trail Reports
- Export to Excel
- Export to PDF
- Print Reports

### Dashboard
- Client Statistics
- Filing Status
- Pending Reconciliations
- Tax Deadlines
- Interactive Charts

---

## 🛠 Technology Stack

- Laravel 12
- PHP 8.2
- MySQL
- AdminLTE
- Bootstrap 5
- JavaScript
- DataTables
- Laravel Excel
- SweetAlert2
- Vite

---

## 📂 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

## ⚙ Installation

Clone the repository:

```bash
git clone https://github.com/Eddie7031/tax_compliance_system.git
```

Move into the project directory:

```bash
cd tax_compliance_system
```

Install dependencies:

```bash
composer install
npm install
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database in the `.env` file, then run:

```bash
php artisan migrate
```

Start the development server:

```bash
php artisan serve
```

Compile frontend assets:

```bash
npm run dev
```

---

## 📌 Current Development Progress

- ✅ Laravel Installation
- ✅ Authentication
- ✅ AdminLTE Dashboard
- ✅ Client Management CRUD
- ✅ Role Management
- 🔄 DataTables Integration
- 🔄 Client Document Management
- 🔄 VAT Module
- 🔄 WHT Module
- 🔄 Reconciliation Engine
- 🔄 Reports & Analytics

---

## 🎯 Future Enhancements

- Email Notifications
- Tax Deadline Reminders
- Multi-Company Support
- Approval Workflows
- API Integration
- Business Intelligence Dashboard
- AI-assisted Reconciliation

---

## 👨‍💻 Developer

**Edgar Wafula**



## 📄 License

This project is licensed under the MIT License.