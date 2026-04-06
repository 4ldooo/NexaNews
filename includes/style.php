<style>
body {
    background: #0f172a;
    color: #f8fafc;
}

/* NAVBAR */
.navbar-main {
    background: #020617;
    padding: 15px;
}

/* KATEGORI */
.kategori-bar {
    background: #020617;
    border-bottom: 1px solid #1e293b;
}

.kategori-container {
    display: flex;
    gap: 15px;
    overflow-x: auto;
    padding: 10px;
}

.kategori-item {
    color: #cbd5e1;
    text-decoration: none;
    padding: 6px 14px;
    border-radius: 20px;
}

.kategori-item.active {
    background: #f59e0b;
    color: black;
}

/* HERO */
.card-hero {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
}

.card-hero img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    filter: brightness(60%);
}

.hero-content {
    position: absolute;
    bottom: 20px;
    left: 20px;
}

/* CARD */
.card-berita {
    background: #1e293b;
    padding: 15px;
    border-radius: 15px;
}

.card-berita img {
    width: 100%;
    border-radius: 10px;
}

.card-berita p {
    color: #cbd5e1;
    font-size: 14px;
}

/* BUTTON */
.btn-baca {
    background: #f59e0b;
    color: black;
}

/* FOOTER */
.footer {
    margin-top: 50px;
    text-align: center;
    color: #94a3b8;
}
</style>