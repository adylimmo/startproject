import AppState from 'AppState'
import PushNotification from 'react-native-push-notification';
import BackgroundJob from 'react-native-background-job';

// Ambil Inisialisasi firebase
import firebaseInit from './firebaseInit';

class backgroundService{

    aktif = false;
    jobkeyInit = "customerAppsBackgroundServiceInit";
    jobkeyName = "customerAppsBackgroundService";
    runningService = false;
    firstCall = 1;

    tes(){
        console.log(AppState.currentState);
    }

    /**
     * Cari array jobkey berdasarkkan kunci jobkey
     * @param  {jobKey} arr   array jobkey yang di dapat dari getAll
     * @param  {string} kunci Kata kunci jobkey
     * @return {Boolean}      true/false
     */
    cariJobKey(arr, kunci) {
        for (var i in arr) {
            if(arr.hasOwnProperty(i) && arr[i].jobKey == kunci) {
                return true;
            }
            else {
                continue;
            }
        }
        return false;
    };

    /**
     * Init Background Service
     */
    init()
    {
        let parentThis = this;
        BackgroundJob.cancel({jobKey: this.jobkeyName});

        backgroundJob = {
            jobKey: this.jobkeyInit,
            job: () => {
                console.log('IS RUN');
                this.runService();
                this.getNotification();
                BackgroundJob.getAll({callback: (jobLists) => {
                    console.log('x', jobLists);
                } });
            }
        }
        BackgroundJob.register(backgroundJob);
        var backgroundSchedule = {
            jobKey: this.jobkeyInit,
            timeout: 2000,
            period: 100,
        }
        BackgroundJob.getAll({callback: (jobLists) => {
            console.log('0', jobLists);
            console.log('jobkeyInit', parentThis.jobkeyInit);
            if (!parentThis.cariJobKey(jobLists, parentThis.jobkeyInit))
            {
                BackgroundJob.schedule(backgroundSchedule);
                console.log('initService scheduled');
            }
        } });
    }

    /**
     * Semua Background Service di mulai disini
     */
    runService()
    {
        let parentThis = this;
        BackgroundJob.cancel({jobKey: this.jobkeyInit});
        if (!this.runningService) {
            this.runningService = true;
            // backgroundJob = {
            //     jobKey: this.jobkeyName,
            //     job: () => {
            //         // Fungsi-fungsi Background Service yang di jalankan
            //         // this.getNotification();
            //         // console.log();
            //     }
            // }
            // BackgroundJob.register(backgroundJob);
            var backgroundSchedule = {
                jobKey: this.jobkeyInit,
                timeout: 5000,
                period: (1000 * 60),
            }
            BackgroundJob.getAll({callback: (jobLists) => {
                console.log('1', jobLists);
                console.log('jobkeyInit', this.jobkeyInit);
                if (!this.cariJobKey(jobLists, this.jobkeyInit))
                {
                    console.log('2', jobLists);
                    BackgroundJob.getAll({callback: (jobLists) => {
                        console.log('3', jobLists);
                    } });
                    // BackgroundJob.cancel({jobKey: this.jobkeyInit});
                    BackgroundJob.schedule(backgroundSchedule);
                    console.log('runService scheduled');
                }
            } });
        }
    }

    getNotification()
    {
        if (!this.aktif)
        {
            let parentThis = this;
            this.aktif = true;
            this.ref = firebaseInit.database().ref('tasks');
            this.ref.on(
                "value",
                function(tasks){
                    console.log('home.js cb dari firebase', tasks.val());
                    if (parentThis.firstCall > 1) {
                        PushNotification.localNotification({
                            /* Android Only Properties */
                            ticker: "You Have New Billing", // (optional)
                            autoCancel: true, // (optional) default: true
                            subText: "Click to see more", // (optional) default: none
                            tag: 'Customer_Sales_Force', // (optional) add tag to message
                            group: "Billing", // (optional) add group to message

                            /* iOS and Android properties */
                            title: "Customer Sales Force", // (optional, for iOS this is only used in apple watch, the title will be the app name on other iOS devices)
                            message: "You Have New Billing", // (required)
                            // actions: '["Yes", "No"]',  // (Android only) See the doc for notification actions to know more
                        });
                    }
                    parentThis.firstCall++;
                },
                function(error){
                    console.log('error: '+ error);
                }
            );
        }
    }

}

export default new backgroundService;
