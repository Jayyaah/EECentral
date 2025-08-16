insert into game(name, short_code) values ('Black Ops 6','BO6')
    on conflict do nothing;

insert into map(game_id, name, slug, description, release_date)
select g.id, 'Classified Nexus', 'classified-nexus', 'Map de test', '2025-01-01'
from game g where g.short_code='BO6'
    on conflict do nothing;

insert into post(map_id, title, slug, excerpt, content_md, status, published_at)
select m.id,
       'EE Principal — Classified Nexus',
       'ee-principal-classified-nexus',
       'Étapes essentielles de l''Easter Egg principal.',
       '## Étape 1\nTrouver les 3 fusibles...',
       'PUBLISHED',
       now()
from map m where m.slug='classified-nexus'
    on conflict do nothing;
