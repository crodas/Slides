<?php

// This method will be executed for each news
var $map = function() {
    // if the document doesn't have categories
    if (!this.categories) {
        // return nothing
        return;
    }
    for ($index in this.categories) {
        // return (several times) a new document
        // with _id: category_name, and value: 1
        emit(this.categories[$index].name, 1);
    }
}
