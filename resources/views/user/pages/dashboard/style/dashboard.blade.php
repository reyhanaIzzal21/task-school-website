<style>
    :root {
        --background-color: #040000;
        --default-color: #f8f8f8;
        --heading-color: #ffffff;
        --accent-color: #e59d02;
        --surface-color: #191919;
        --contrast-color: #ffffff;
    }

    body {
        background-color: var(--background-color);
        color: var(--default-color);
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
        border-color: rgba(229, 157, 2, 0.2);
    }

    .btn-primary {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .btn-primary:hover {
        background-color: #cc8a02;
        border-color: #cc8a02;
    }

    .form-control {
        background-color: var(--surface-color);
        border-color: rgba(229, 157, 2, 0.3);
        color: var(--default-color);
    }

    .form-control:focus {
        background-color: var(--surface-color);
        border-color: var(--accent-color);
        color: var(--default-color);
        box-shadow: 0 0 0 0.2rem rgba(229, 157, 2, 0.25);
    }
</style>
