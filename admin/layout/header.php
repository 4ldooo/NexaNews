<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body {
    background: #0f172a;
    color: #f8fafc;
}

/* SIDEBAR */
.sidebar {
    width: 230px;
    height: 100vh;
    background: #020617;
    position: fixed;
    padding: 20px;
}

.sidebar a {
    display: block;
    color: #cbd5e1;
    padding: 10px;
    text-decoration: none;
    border-radius: 8px;
}

.sidebar a:hover {
    background: #1e293b;
    color: #f59e0b;
}

body {
    background: #0f172a;
    color: #f1f5f9;
    font-family: 'Segoe UI', sans-serif;
}

/* CONTENT */
.content {
    margin-left: 250px;
    padding: 30px;
}

/* CARD */
.card-modern {
    background: #1e293b;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

/* TITLE */
h3 {
    font-weight: 600;
}

/* TABLE */
.table {
    border-radius: 12px;
    overflow: hidden;
}

.table thead {
    background: #020617;
}

.table th {
    font-size: 14px;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table td {
    vertical-align: middle;
}

/* HOVER */
.table tbody tr:hover {
    background: #334155;
    transition: 0.2s;
}

/* BUTTON */
.btn {
    border-radius: 8px;
    font-size: 13px;
    padding: 5px 10px;
}

.btn-primary {
    background: #3b82f6;
    border: none;
}

.btn-danger {
    background: #ef4444;
    border: none;
}

/* BADGE */
.badge {
    font-size: 12px;
    padding: 6px 10px;
    border-radius: 10px;
}

/* DATATABLE */
.dataTables_wrapper .dataTables_filter input {
    background: #020617;
    border: 1px solid #334155;
    color: white;
    border-radius: 8px;
    padding: 6px;
}

.dataTables_wrapper .dataTables_length select {
    background: #020617;
    color: white;
    border-radius: 8px;
}

/* PAGINATION */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    background: #1e293b !important;
    color: white !important;
    border-radius: 6px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #f59e0b !important;
    color: black !important;
}

.badge {
    font-size: 11px;
    padding: 5px 8px;
    border-radius: 8px;
    font-weight: 500;
}

</style>

</head>
<body>