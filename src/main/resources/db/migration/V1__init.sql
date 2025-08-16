-- Jeux
create table if not exists game (
                                    id bigserial primary key,
                                    name varchar(80) not null,
    short_code varchar(10) not null unique
    );

-- Maps
create table if not exists map (
                                   id bigserial primary key,
                                   game_id bigint references game(id),
    name varchar(120) not null,
    slug varchar(140) not null unique,
    description text,
    release_date date
    );

-- Statut d'article
do $$
begin
  if not exists (select 1 from pg_type where typname = 'post_status') then
create type post_status as enum ('DRAFT','REVIEW','PUBLISHED');
end if;
end$$;

-- Articles liés à une map
create table if not exists post (
                                    id bigserial primary key,
                                    map_id bigint not null references map(id) on delete cascade,
    title varchar(160) not null,
    slug varchar(180) not null unique,
    excerpt text,
    content_md text,
    status post_status not null default 'DRAFT',
    published_at timestamptz,
    created_at timestamptz not null default now(),
    updated_at timestamptz not null default now()
    );

create index if not exists idx_post_map on post(map_id);
create index if not exists idx_post_status on post(status);
