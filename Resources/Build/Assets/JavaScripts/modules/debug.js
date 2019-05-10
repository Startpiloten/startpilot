import {devDomain} from "../main"

const devLog = function (varToLog) {
    const Console = console;
    if (document.domain === devDomain) {
        Console.log(varToLog);
    }
};

export {devLog};
