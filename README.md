# gif-manager

### Gestionnaire de gifs avec une partie back (admin) et une partie front pour afficher les gifs

### mocodo
USER: id, firstname, lastname, email, password, created_at, updated_at
GIF: id, name, tag_id, created_at, updated_at
belongs to, 1N TAG, 1N GIF
TAG: id, name, gif_id, created_at, updated_at
