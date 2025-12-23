<style>
    /* Dark Mode Background & Glassmorphism Overrides */
    .fi-body {
        background-color: #050505 !important;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(255, 100, 0, 0.05) 0%, transparent 20%),
            radial-gradient(circle at 90% 80%, rgba(50, 100, 255, 0.05) 0%, transparent 20%) !important;
        min-height: 100vh;
    }

    /* Glassmorphism for Sidebar */
    .fi-sidebar {
        background-color: rgba(5, 5, 5, 0.8) !important;
        backdrop-filter: blur(20px);
        border-right: 1px solid rgba(255, 255, 255, 0.05) !important;
    }

    .fi-sidebar-header {
        background-color: transparent !important;
    }

    /* Glassmorphism for Topbar */
    .fi-topbar {
        background-color: rgba(5, 5, 5, 0.8) !important;
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
    }

    /* Cards & Widgets */
    .fi-section, .fi-wi-stats-overview-stat, .fi-wi-chart {
        background-color: rgba(20, 20, 20, 0.6) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-radius: 1.5rem !important; /* Rounded-3xl */
    }

    /* Tables */
    .fi-ta-content {
        background-color: rgba(20, 20, 20, 0.6) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        border-radius: 1.5rem !important;
    }

    .fi-ta-header-cell {
        background-color: transparent !important;
    }

    .fi-ta-row:hover {
        background-color: rgba(255, 165, 0, 0.05) !important;
    }

    /* Buttons */
    .fi-btn-primary {
        background: linear-gradient(135deg, #f97316 0%, #fa5c05 100%) !important;
        border: none !important;
        box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3) !important;
    }

    /* Inputs */
    .fi-input {
        background-color: rgba(0, 0, 0, 0.3) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
    
    /* Global Text */
    .fi-logo {
        color: white !important;
    }
</style>
