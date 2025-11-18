<style>
    /* Dashboard Theme Colors - Aligned with SMAN 1 Ponorogo brand */
    :root {
        --dashboard-primary: #1e60ee;
        --dashboard-secondary: #ffc107;
        --dashboard-accent: #1e3a5f;
        --dashboard-light: #f8f9fa;
        --dashboard-white: #ffffff;
        --dashboard-text: #2c3e50;
        --dashboard-text-light: #6c757d;
        --dashboard-success: #28a745;
        --dashboard-info: #17a2b8;
        --dashboard-warning: #ffc107;
        --dashboard-danger: #dc3545;
    }

    /* Body & Background */
    body {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: var(--dashboard-text);
        font-family: 'Inter', 'Segoe UI', sans-serif;
    }

    .banner {
        background: linear-gradient(135deg, var(--surface-color), var(--accent-color));
    }

    .profile-img {
        background-color: var(--surface-color);
        border: 4px solid var(--accent-color);
        color: var(--accent-color);
    }

    .card {
        background-color: var(--surface-color);
        border-color: rgb(30, 96, 238);
    }

    .bg-blue {
        background-color: rgb(30, 96, 238);
    }

    .btn-primary {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .btn-primary:hover {
        background-color: #1e60ee;
        border-color: #1e60ee;
    }

    .form-control {
        background-color: var(--surface-color);
        border-color: rgb(30, 96, 238);
        color: var(--default-color);
    }

    .form-control:focus {
        background-color: var(--surface-color);
        border-color: var(--accent-color);
        color: var(--default-color);
        box-shadow: 0 0 0 0.2rem rgb(30, 96, 238);
    }
</style>
