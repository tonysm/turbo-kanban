import { Controller } from "@hotwired/stimulus"
import Sortable from 'sortablejs'

// Connects to data-controller="sortable"
export default class extends Controller {
    static values = {
        groupName: String,
        url: String,
    }

    static classes = ['ghost']

    #sortable

    connect() {
        this.#sortable = new Sortable(this.element, {
            group: this.groupNameValue,
            animation: 150,
            ghostClass: this.hasGhostClass ? this.ghostClass : 'opacity-0',
            onEnd: this.#updateOrder.bind(this),
        })
    }

    #updateOrder(data) {
        const { newIndex, oldIndex, item, from, to } = data
        const itemId = item.dataset.sortableId

        fetch(this.urlValue.replace(':item_id', itemId), {
            method: 'PUT',
            headers: {
                'X-CSRF-Token': document.head.querySelector('[name=csrf-token]').content,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                'item_id': itemId,
                'from': oldIndex,
                'to': newIndex,
                'from_parent_id': from.dataset?.sortableParentId ?? null,
                'to_parent_id': to.dataset?.sortableParentId ?? null,
            }),
        })
    }
}
