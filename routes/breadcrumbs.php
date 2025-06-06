<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin Dashboard
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Admin Dashboard', route('admin.dashboard'));
});

// Admin Dashboard > Users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Users', route('users.index'));
});

// Admin Dashboard > Users > Show
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail , $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show',$user->id));
});

// Admin Dashboard > Users > Trashed
Breadcrumbs::for('users.trashed', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Trashed', route('users.trashed'));
});



// Admin Dashboard > Agent Requests
Breadcrumbs::for('agent-requests', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Agent Requests', route('agent-requests'));
});


// Admin Dashboard > Agent Requests > Accepted
Breadcrumbs::for('agent-requests-accepted', function (BreadcrumbTrail $trail) {
    $trail->parent('agent-requests');
    $trail->push('Accepted', route('agent-requests-accepted'));
});

// Admin Dashboard > Agent Requests > Rejected
Breadcrumbs::for('agent-requests-rejected', function (BreadcrumbTrail $trail) {
    $trail->parent('agent-requests');
    $trail->push('Rejected', route('agent-requests-rejected'));
});

// Admin Dashboard > Agent Requests > Trashed
Breadcrumbs::for('agent-requests-softDeleted', function (BreadcrumbTrail $trail) {
    $trail->parent('agent-requests');
    $trail->push('Trashed', route('agent-requests-softDeleted'));
});

// Admin Dashboard > Mobile
Breadcrumbs::for('mobiles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Mobiles', route('mobiles.index'));
});
// Admin Dashboard > Mobile > specification
Breadcrumbs::for('specification', function (BreadcrumbTrail $trail, $mobile) {
    $trail->parent('admin.dashboard'); 
    $trail->push('Mobiles', route('mobiles.index')); 
    $trail->push('Mobile Specification', route('specification', $mobile->id));   
});
// Admin Dashboard > Mobile > Description
Breadcrumbs::for('description', function (BreadcrumbTrail $trail, $mobile) {
    $trail->parent('admin.dashboard'); 
    $trail->push('Mobiles', route('mobiles.index')); 
    $trail->push('Mobile Description', route('description', $mobile->id));   
});
// Admin Dashboard > Mobile > images
Breadcrumbs::for('images', function (BreadcrumbTrail $trail, $mobile) {
    $trail->parent('admin.dashboard'); 
    $trail->push('Mobiles', route('mobiles.index')); 
    $trail->push('Mobile Images', route('images', $mobile->id));   
});
// Admin Dashboard > Mobile > add mobile
Breadcrumbs::for('mobiles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard'); 
    $trail->push('Mobiles', route('mobiles.index')); 
    $trail->push('Add Mobile', route('mobiles.create'));   
});