export default class Emesis {
    constructor(allocators) {
        // Get all recievers
        this.recievers = Array.from(document.head.querySelectorAll("meta[allocation]")).map(allocator => allocator.getAttribute("allocation"));

        // Allocate each reaciever
        this.recievers.forEach(reciever => {
            if (!allocators[reciever]) {
                this.error(`No allocator found for ${reciever} reciever`);
                return;
            } else {
                allocators[reciever]();
            }
        });

        this.log("Allocators loaded");
    }

    log(message) {
        console.log(`[Emesis] ${message}`);
    }

    error(message) {
        console.log(`[Emesis][!] ${message}`);
    }
}